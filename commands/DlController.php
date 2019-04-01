<?php

namespace app\commands;

require_once dirname(__DIR__) . "/yii2helper/PHPHelper.php";

use app\models\Band;
use app\models\BandEvent;
use app\models\Event;
use app\models\Venue;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;
use usv\yii2helper\PHPHelper;
use Yii;
use yii\console\Controller;

define('SDRCOM', 'https://www.sandiegoreader.com/');
define('SDREADER', 'https://www.sandiegoreader.com/events/search/?category=Genre');//&start_date=2018-07-04&end_date=2018-07-04
define('SDREADER_LOCAL', 'http://lnoapi/scrape/Eventsearch_SanDiegoReader.html');
define('SDREVENT_LOCAL', 'http://lnoapi/scrape/gingercowgirl.html');
define('SDRBAND_LOCAL', 'http://lnoapi/scrape/band_gg_cowgirl.html');

/**
 * The behind the scenes magic happens here
 *
 * @author Brian Nguyen
 */
class DlController extends Controller
{
    public $SCRAPER_ID = null;

    public function init()
    {
        $this->SCRAPER_ID = \Yii::$app->params['scraper_id'];
        parent::init();
    }

    public function actionScrapeSdrAll()
    {
        $this->actionScrapeSdr();
        $this->actionPullEventSdr();
        $this->actionVenueAddrSdr();
    }

    public function actionScrapeReverbAll()
    {
        $this->actionScrapeReverb();
        $this->actionPullBandReverb();
    }

    /**
     * Pull events from SDReader
     * @param int $days_forward lookahead
     * @throws \Exception
     */
    public function actionScrapeSdr($days_forward = 7)
    {
        $date = (new \DateTime())->add(new \DateInterval("P{$days_forward}D"));
        $date_str = $date->format('Y-m-d');
        $records = 0;
        $client = new Client();
        $event_client = new Client();
        $band_client = new Client();
        $crawler = $client->request('GET', SDREADER, ['start_date' => $date_str, 'end_date' => $date_str]);
//        $crawler = $client->request('GET', SDREADER_LOCAL, ['start_date' => '2018-07-04', 'end_date' => '2018-07-04']);
        $crawler->filter('table.event_list tr')->each(function ($event_and_venue) use (&$records, $date_str, $event_client, $band_client) {
            /** @var Crawler $event_and_venue */
            [$venue_name, $venue_href] = current($event_and_venue->filter('h5.place > a')->extract(['_text', 'href']));
            if (empty($venue_name)) {
                return;
            }
            [$event_name, $event_href] = current($event_and_venue->filter('h4 > a')->extract(['_text', 'href']));
            //see if it has local artist page
            $event_crawler = $event_client->request('GET', SDRCOM . $event_href);
            $h4_local_artist = $event_crawler->filter('h4:contains("Local artist page:")');
            $has_local_artist = $h4_local_artist->count() > 0;
            if (!$has_local_artist) {
                return;
            }
            //find out if venue already exists
            $venue_exist = Venue::findOne(['name' => $venue_name]);
            if (!$venue_exist instanceof Venue) {
                $venue = new Venue();
                $venue->setAttributes(['name' => $venue_name,
                    'sdr_name' => str_replace('https://www.sandiegoreader.com', '', $venue_href),
                    'system_note' => $venue_href]);//'https://www.sandiegoreader.com' .
                $venue->save();
                $venue_id = $venue->id;
            } else {
                $venue_id = $venue_exist->id;
            }
            if (!is_int($venue_id)) {
                return;//when failed saving new venue / pulling existing venue
            }
            Yii::$app->db->createCommand("UPDATE venue SET `created_by` = :created_by WHERE `id` = :venue_id")
                ->bindValues([':created_by' => $this->SCRAPER_ID, ':venue_id' => $venue_id])->execute();
            $records++;
            //find out if event already exists
            $event = new Event();
            $event_exist = Event::findOne(['name' => $event_name]);
            if (!$event_exist instanceof Event) {
                $event = new Event();
                $event->setAttributes(['created_by' => $this->SCRAPER_ID, 'name' => $event_name, 'source' => 'sdr',
                    'sdr_name' => str_replace('https://www.sandiegoreader.com/', '', $event_href), 'system_note' => $event_href]);//'https://www.sandiegoreader.com/' .
                $time = $event_and_venue->filter('td.time')->text();
                $city = $event_and_venue->filter('td.city>ul>li>a')->text();
                $short_desc = implode(', ', $event_and_venue->filter('td.category > ul li')->extract(['_text']));
                $event->venue_id = $venue_id;
                $event->date = $date_str;
                $event->setAttributes(compact(['time', 'city', 'short_desc']));
                $event->save();
                $event_id = $event->id;
                if (is_int($event_id)) {
                    Yii::$app->db->createCommand("UPDATE event SET `created_by` = :created_by WHERE `id` = :id")->bindValues([':created_by' => $this->SCRAPER_ID, ':id' => $event_id])->execute();
                }
                $records++;
            } else {
                $event_id = $event->id;
            }

            if (!$has_local_artist) {
                return;
            }
            //saving band info too
            $band_href = $h4_local_artist->nextAll()->filter('div.image_grid a')->attr('href');
            $band_crawler = $band_client->request('GET', SDRCOM . $band_href);
//            $band_crawler = $band_client->request('GET', SDRBAND_LOCAL);
            $band_content = $band_crawler->filter('#content');
            $name = $band_content->filter('div.content_title > h2')->text();
            if (empty($name)) {
                return;
            }
            try {
                $name = strtolower($name);
                $hometown_city = 'San Diego';
                $hometown_state = 'CA';
                $logo = $band_content->filter('img.lead_photo')->attr('src');
                if (empty($logo)) {
                    return;
                }
                $genre = $band_content->filter('strong:contains("Genre:")')->parents()->text();
                $genre = strtolower(str_replace(['Genre: ', ', '], ['', ','], $genre));
                $similar_to = $band_content->filter('strong:contains("RIYL:")')->parents()->text();
                $similar_to = strtolower(str_replace(['RIYL: ', ', '], ['', ','], $similar_to));
                $description = $band_content->filter('h3#history')->parents()->text();
                $related = $band_content->filter('h3#related')->parents();
                $website = $related->filter('a:contains("website")')->attr('href');
                $facebook = $related->filter('a:contains("Facebook")')->attr('href');
            } catch (\Exception $e) {
                $band_content = null;
                $logo = null;
                $genre = null;
                $similar_to = null;
                $description = null;
                $website = null;
                $facebook = null;
            }
            $band = Band::findOne(['name' => $name]);
            if (!$band instanceof Band) {
                $band = new Band();
                $band->setAttributes(compact(['name', 'logo', 'genre', 'similar_to', 'hometown_city', 'hometown_state', 'description', 'website', 'facebook']));
                $band->type = 'originals';
                $band->lno_score = random_int(5, 10);
                $band->save();
            }
            $band_id = $band->id;
            if (is_int($band_id) && is_int($event_id)) {
                $band_event = new BandEvent();
                $band_event->band_id = $band_id;
                $band_event->event_id = $event_id;
                $band_event->save();
            }
        });
        echo "Pulled this much: " . $records . " records." . PHP_EOL;
    }

    /**
     * Pull address for all venues without address
     */
    public function actionVenueAddrSdr()
    {
        $updated = 0;
        $venues_wo_addr = Venue::find()->where(['not', ['sdr_name' => null]])->andWhere(['address1' => null])->all();
        $venue_client = new Client();
        foreach ($venues_wo_addr as $venue_wo_addr) {
            $sdr_url = SDRCOM . $venue_wo_addr->sdr_name;
            $sdr_url = str_replace(SDRCOM . SDRCOM, SDRCOM, $sdr_url);//remove duplicates
            $crawler = $venue_client->request('GET', $sdr_url);
            $type_a = $crawler->filter('ul.categories > li:first-child > a');
            if ($type_a instanceof Crawler) {
                $type = $type_a->text();
            } else {
                $type = null;
            }
            $addr_a = $crawler->filter('a:contains("Directions")');
            if ($addr_a instanceof Crawler) {
                $addr = $addr_a->parents()->text();
            }
            if (empty($addr)) {
                return false;
            }
            $addr = str_replace(' | Directions', '', $addr);
            $addr = str_replace(' (NCC)', '', $addr);
            $address_variables = PHPHelper::parseAddress($addr);
            $venue_wo_addr->setAttributes($address_variables);
            if ($venue_wo_addr->save()) {
                $updated++;
            }
        }
        echo "Updated $updated rows\n";
        return true;
    }

    /**
     * Pull event info from SDR events
     */
    public function actionPullEventSdr()
    {
        $client = new Client();
        $events_sdr = Event::find()->where(['source' => 'sdr'])->andFilterWhere(['or', ['img' => null], ['img' => '']])
//            ->andWhere(['>=', 'updated_at', new Expression('DATE_SUB(CURDATE(), INTERVAL 7 DAY)')])
            ->all();
//        $events_sdr = array_slice($events_sdr, 0, 1);//todob debugging
        foreach ($events_sdr as $event_sdr) {
//            $crawler = $client->request('GET', SDREADER, ['start_date' => $date_str, 'end_date' => $date_str]);
//            $crawler = $client->request('GET', 'http://lnoapi/scrape/Opera%20Appreciation%20Class%20_%20San%20Diego%20Reader.html');//local
            $crawler = $client->request('GET', $event_sdr->system_note);
            $content_info = $crawler->filter('div.content_info');
            $img = null;
            try {
                $img = $content_info->filter('div.thumbnail-container > img')->attr('src');
            } catch (\Exception $exception) {
            }
            $img = preg_replace('/\?[a-z0-9]+/', '', $img);//https://media.sandiegoreader.com/img/events/2017/images_3_t240.jpg?abc123
            $description = null;
            try {
                $description = $content_info->filter('div.thumbnail-container +div')->text();
            } catch (\Exception $exception) {
            }
            $cost = null;
            try {
                $cost = $content_info->filter('ul.details > li:first-child')->text();
            } catch (\Exception $e) {
            }
            if (strpos($cost, 'Cost:') !== false) {
                $cost = trim(str_replace('Cost:', '', $cost));
                $cost = preg_replace('/\n\| Website/', '', $cost);
                $cost = str_replace('$', '', $cost);
            } else {
                $cost = null;
            }
            $age_limit = null;
            try {
                $age_limit = $content_info->filter('ul.details > li:nth-child(2)')->text();
            } catch (\Exception $e) {
            }
            if (strpos($age_limit, 'Age limit:') !== false) {
                $age_limit = trim(str_replace('Age limit:', '', $age_limit));
            } else {
                $age_limit = null;
            }
            $when = null;
            try {
                $when = $content_info->filter('ul.details > li:nth-child(3)')->text();
            } catch (\Exception $e) {
            }
            if (strpos($when, 'When:') !== false) {
                $when = trim(str_replace('When:', '', $when));
            } else {
                $when = null;
            }
            $event_sdr->setAttributes(compact('img', 'description', 'cost', 'age_limit', 'when'));
            $event_sdr->save();
        }
    }

    /**
     * Scrape from ReverbNation
     */
    public function actionScrapeReverb($per_page = 10)
    {
//        $IS_DEBUG = true;
        $IS_DEBUG = false;
        $scraped = 0;
        $url = "https://www.reverbnation.com/main/local_scene_data?location={\"geo\":\"local\",\"country\":\"US\",\"state\":\"CA\",\"city\":\"San Diego\",\"postal_code\":\"92115\"}&page=1&range={\"type\":\"full\",\"date\":\"\"}";
        if ($IS_DEBUG) {
            $events = file_get_contents(dirname(__DIR__) . "/web/scrape/reverb_ev.json");
//            var_dump($events);
//            return true;
        } else {
            $params = ['per_page' => $per_page];
            $guzzle = new GuzzleClient();
            $events = $guzzle->request('GET', $url, $params);
            if ($events->getStatusCode() !== 200) {
                echo 'Failed. ' . $events->getStatusCode();
                return false;
            }
            $events = $events->getBody();
            if (!method_exists($events, 'getContents')) {
                echo 'Bad response. Url: ' . $url;
                return false;
            }
            $events = $events->getContents();
        }
        $events = json_decode($events);

        if (isset($events->shows) && is_array($events->shows)) {
            foreach ($events->shows as $show) {
//                var_dump($show);
                $venue = Venue::findOrCreate(['name' => $show->venue_name]);
                /** @var $venue Venue */
                $venue->created_by = $this->SCRAPER_ID;
                $venue->source = 'reverb';
                $event_columns = ['venue_id' => $venue->id];
                $show_time = \DateTime::createFromFormat('Y/m/d H:i:s', $show->showtime);
                $event_columns['date'] = $show_time->format('Y-m-d');
                $event_columns['start_time'] = $show_time->format('h:i:s');
                $event = Event::findOrCreate($event_columns);
                $event->source = 'reverb';
                /** @var Event $event */
                $venue_attrs = ['venue_link' => $show->venue_link, 'show_id' => $show->show_id, 'artists' => json_encode($show->artists)];
                $venue->city = $show->city;
                $venue->state = $show->state;
                $venue->attr = $venue_attrs;
                try {
                    $venue->save();
                } catch (\Exception $exception) {
                    Yii::error($exception);
                    continue;
                }
                if ($venue->errors) {
                    Yii::error($venue->errors);
                }
                $event->img = $show->image_url;
                $event->venue_id = $venue->id;
                $event->name = $venue->name;
                $event->date = $event_columns['date'];
                try {
                    $event->save();
                } catch (\Exception $exception) {
                    Yii::error($exception);
                    continue;
                }
                //now parse bands
                foreach ($show->artists as $artist) {
                    $band_columns = ['name' => $artist->name];
                    $band = Band::findOrCreate($band_columns);
                    /** @var Band $band */
                    $band->source = 'reverb';
                    $band->attr = ['id' => $artist->id, 'url' => $artist->url];
                    try {
                        $band->save();
                    } catch (\Exception $e) {
                        Yii::error($e);
                        continue;
                    }
                    if ($band->errors) {
                        Yii::error($band->errors);
                    }
                    $band_event = new BandEvent();
                    $band_event->band_id = $band->id;
                    $band_event->event_id = $event->id;
                    $band_event->created_by = $this->SCRAPER_ID;
                    try {
                        $band_event->save();
                    } catch (\Exception $exception) {
                        //ignore. probably duplicate band_event
                    }
                }
                $scraped++;
//                echo "Pulled: $scraped events";
//                return true;//todob debug
            }
        }
        echo "Pulled: $scraped events";
        return false;
    }

    /**
     * Pull band details for reverbnation
     * Getting them from https://www.reverbnation.com/api/artist/3981578
     */
    public function actionPullBandReverb()
    {
        $bands = Band::findAll(['source' => 'reverb', 'description' => null]);
        $goutte = new Client();
        $guzzle = new \GuzzleHttp\Client();
        $base_api_url = 'https://www.reverbnation.com/api/artist/';
        $scraped = 0;
        foreach ($bands as $band) {
            $url = $band->attr['url'];
            if (empty($url)) {
                continue;
            }
            $crawler = $goutte->request('get', $url);
            $image_src = $crawler->filter('meta[name="image_src"]');
            try {
                $image_src = $image_src->attr('content');
                $band_id = null;
                if (preg_match("/.*\/artists\/images\/(\d+).*/", $image_src, $band_id) && isset($band_id[1])) {
                    $band_id = $band_id[1];////https://gp1.wac.edgecastcdn.net/802892/http_public_production/artists/images/3981578/original/crop:x0y0w756h567/hash:1467524721/1461597472_E0694166-AE0B-43F0-8ED0-966218024D8C-1314-0000015D04CE333B.jpg?1467524721;
                }
            } catch (\Exception $exception) {
                continue;
            }
            if (!is_int(intval($band_id))) {
                continue;
            }
            $band_api_data = $guzzle->request('get', $base_api_url . $band_id);
            if ($band_api_data->getStatusCode() !== 200) {
                echo 'Failed. ' . $band_api_data->getStatusCode();
                continue;
            }
            $band_api_data = $band_api_data->getBody();
            if (!method_exists($band_api_data, 'getContents')) {
                echo 'Bad response. Url: ' . $url;
                continue;
            }
            $band_api_data = $band_api_data->getContents();
            try {
                $band_api_data = json_decode($band_api_data);
            } catch (\Exception $exception) {
                continue;
            }
            $band->attr = $band_api_data;
            $band->description = $band_api_data->bio;
            $band->logo = $band_api_data->cover_photo->url;
            $band->lno_score = random_int(6, 10);
            $band->genre = implode(',', $band_api_data->genres);
            $band->facebook = $band_api_data->fb_share_url ? $band_api_data->fb_share_url : null;
            try {
                $band->save();
            } catch (\Exception $exception) {
                continue;
            }
            if ($band->errors) {
                Yii::error($band->errors);
            } else {
                $scraped++;
            }
        }
        echo "Scraped $scraped bands" . PHP_EOL;
    }
}
