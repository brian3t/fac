<?php

namespace app\models;

use app\models\base\Venue as BaseVenue;
use app\override\helpers\ArrayHelper;
use usv\yii2helper\models\ModelB3tTrait;


/**
 * This is the model class for table "venue".
 */
class Venue extends BaseVenue
{
    use ModelB3tTrait;

    public function pull_address()
    {
        $full = implode(', ', [$this->address1, $this->address2, $this->city, $this->state, $this->zip]);
        return $full;
    }
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), ['events' => 'eventsNonInverse']);
    }
}
