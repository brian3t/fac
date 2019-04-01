<?php

namespace app\models;

use app\models\base\Settlement as BaseSettlement;

/**
 * This is the model class for table "settlement".
 */
class Settlement extends BaseSettlement
{
    public static $order_by_col='settlement_id';
    public function beforeValidate()
    {
        $this->settlement_id = strval($this->settlement_id);
        return parent::beforeValidate();
    }
}
