<?php
/**
 * Event Controller REST
 */

namespace app\api\modules\v1\controllers;

use app\api\base\controllers\BaseActiveController;
use app\models\Event;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

require_once realpath(dirname(dirname(dirname(dirname(__DIR__))))) . "/models/constants.php";
class EventController extends BaseActiveController
{
    // We are using the regular web app modules:
    public $modelClass = 'app\models\Event';

    public function actions()
    {
        $actions = parent::actions();

        // disable the default REST actions
//        unset($actions['index']);

        $actions['index']['prepareDataProvider'] = [$this, 'indexLastMonthPrepareDataProvider'];
        return $actions;
    }

    // prepare and return a data provider for the "index" action
    public function indexLastMonthPrepareDataProvider()
    {
        $params = \Yii::$app->getRequest()->getQueryParams();
        $date_start = $params['date_start'] ?? 60;
        $date_end = $params['date_end'] ?? 60;

        $dp = new ActiveDataProvider(
            [
                'query' => Event::find()->where(['>=', 'date', (new Expression("DATE_SUB(CURDATE(), INTERVAL $date_start DAY)"))]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]
        );
        if (YII_DEBUG) {
            $dp->pagination = false;
        }
        return $dp;
    }

}