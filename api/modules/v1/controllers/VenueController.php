<?php
namespace app\api\modules\v1\controllers;

use app\api\base\controllers\BaseActiveController;
use yii\rest\ViewAction;


class VenueController extends BaseActiveController
{
    public $modelClass = 'app\models\Venue';
    public function actions()
    {
        $actions = parent::actions();

        // disable the default REST actions
//        unset($actions['view']);
//        $actions['view']['class'] = 'app\api\modules\v1\controllers\VenueViewAction';
        return $actions;
    }
}

class VenueViewAction extends ViewAction{
    public $modelClass = 'app\models\Venue';
    public function run($id)
    {
        $model = parent::run($id);
//    $model->events;
    return $model;
    }
}