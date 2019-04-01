<?php

namespace app\api\modules\v1\controllers;

use app\api\base\controllers\BaseActiveController;
use app\models\Band;
use yii\data\ActiveDataProvider;
use yii\rest\IndexAction;


require_once realpath(dirname(dirname(dirname(dirname(__DIR__))))). "/models/constants.php";
class BandController extends BaseActiveController
{
    // We are using the regular web app modules:
    public $modelClass = 'app\models\Band';

    public function actions()
    {
        $actions = parent::actions();

        // disable the default REST actions
//        unset($actions['index']);

        $actions['hasevent']['class']='app\api\modules\v1\controllers\BandRestHasevent';
        $actions['hasevent']['prepareDataProvider'] = [$this, 'haseventPrepareDataProvider'];
        return $actions;
    }

    // prepare and return a data provider for the "index" action
    public function haseventPrepareDataProvider()
    {
        $params = \Yii::$app->getRequest()->getQueryParams();
        $event_date_start = $params['event_date_start'] ?? 60;
        $event_date_end = $params['event_date_end'] ?? 60;
        $sql = '
        select *
FROM
  (select distinct band_id
   FROM (SELECT *
         FROM event
         WHERE date >= DATE_SUB(CURDATE(), INTERVAL :event_date_start DAY)
               AND date <= DATE_ADD(CURDATE(), INTERVAL :event_date_end DAY)) ev
     INNER JOIN (SELECT distinct band_id, event_id
                 FROM band_event) band_event on band_event.event_id = ev.id)
  band_performing
  INNER JOIN band b on band_performing.band_id = b.id';

        $dp = new ActiveDataProvider(
            [
//                'query' => Band::find(),
                'query' => Band::findBySql($sql, [':event_date_start' => $event_date_start, ':event_date_end' => $event_date_end]),
                'pagination' => [
                    'pageSize' => 1,
                ],
            ]
        );
        if (YII_DEBUG) {
            $dp->pagination = false;
        }
        return $dp;

    }



}

class BandRestHasevent extends IndexAction
{
    public $modelClass = 'app\models\Band';
}