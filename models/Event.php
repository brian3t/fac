<?php

namespace app\models;

use app\models\base\Event as BaseEvent;
use usv\yii2helper\models\ModelB3tTrait;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "event".
 */
class Event extends BaseEvent
{
    use ModelB3tTrait;
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBands()
    {
        return $this->hasMany(\app\models\Band::className(), ['id' => 'band_id'])->via('bandEvents')->inverseOf('events');
    }

    public function fields()
    {
//        return parent::fields();
        return ArrayHelper::merge(parent::fields(), ['bands' => 'bands', 'venue']);
    }
}
