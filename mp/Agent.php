<?php
namespace app\mp;


use app\models\Event;
use app\models\Mp;
use yii\db\Expression;


/**
 * Class Agent
 * @package app\mp
 *
 * This is Agent. Responsible for interacting with mp
 */
class Agent
{
    /**
     * @param string $mp_id
     * @param integer $day_offset Days ago. Giving 2 will import orders two days ago
     */
    public function order_import($mp_id, $day_offset = 0) {
        $message = "";
        $event = new Event();
        $event->mp_id = $mp_id;
        $event->action = "MP ORDER IMPORT";
        $event->note = "Params: day_offset: $day_offset" . PHP_EOL;
        $event->start = time();

        echo "Marketplace id: $mp_id \n";

        $mp = Mp::findOne($mp_id);
        echo $mp->name ?? "Marketplace not found. Wrong id?\n";
        echo $mp->config->ftp->host ?? "FTP host missing\n";
        echo $mp->config->api->url ?? "API Url missing\n";
        echo "\n";
        echo "Start pulling..\n";
        if (isset($mp->config->ftp)) {
            $message = $mp->order_import_ftp($day_offset) . PHP_EOL;
        } elseif (is_object($mp->config->api)) {
            $message = $mp->order_import_api($day_offset) . PHP_EOL;
        }
        echo PHP_EOL . $message . PHP_EOL;
        $event->note = $message;
        $event->stop = new Expression('NOW()');
        $event->save();
    }

    /**
     * Flush orders. See details in MP model
     * @param $mp_id
     * @param int $day_offset
     */
    public function order_flush($mp_id, $day_offset = 0) {
        $mp = Mp::findOne($mp_id);
        echo "\n" . $mp->order_flush($day_offset);
    }

    /**
     * Pushes all trackings to a marketplace
     * @param int $mp_id Marketplace ID
     *
     */
    public function tracking_push($mp_id){
        $message = "";
        $event = new Event();
        $event->mp_id = $mp_id;
        $event->action = "MP TRACKING PUSH";
        $event->start = time();
        echo "Marketplace id: $mp_id \n";
    
        $mp = Mp::findOne($mp_id);
        echo $mp->name ?? "Marketplace not found. Wrong id?\n";
        echo $mp->config->ftp->host ?? "FTP host missing\n";
        echo $mp->config->api->url ?? "API Url missing\n";
        echo "\n";
        echo "Start pushing..\n";
    
        if (isset($mp->config->ftp)) {
            $message = $mp->tracking_push() . PHP_EOL;
        } elseif (is_object($mp->config->api)) {
            $message = $mp->tracking_push_api() . PHP_EOL;
        }
        echo PHP_EOL . $message . PHP_EOL;
        $event->note = $message;
        $event->stop = new Expression('NOW()');
        $event->save();
  
    }
    
    /**
     * Update qty to MP
     * @param integer $mp_id Marketplace id
     */
    public function quantity_update($mp_id){
        $mp = Mp::findOne($mp_id);
        echo $mp->name ?? "Marketplace not found. Wrong id?\n";
        echo $mp->config->ftp->host ?? "FTP host missing\n";
        echo $mp->config->api->url ?? "API Url missing\n";
        echo "\n";
        echo "Start updating quantity..\n";
        if (isset($mp->config->ftp)) {
            $message = $mp->quantity_update() . PHP_EOL;
        } elseif (is_object($mp->config->api)) {
            $message = $mp->update_quantity_api() . PHP_EOL;
        }
        
    }
}