<?php

namespace app\models;

use app\models\base\MkTelevision as BaseMkTelevision;

/**
 * This is the model class for table "mk_television".
 */
class MkTelevision extends BaseMkTelevision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['marketing_id', 'company_id', 'gross'], 'required'],
            [['marketing_id', 'company_id', 'promo_tickets', 'qty'], 'integer'],
            [['impressions', 'promo_value', 'gross', 'net'], 'number'],
            [['promo_run_from', 'promo_run_to', 'paid_run_from', 'paid_run_to'], 'safe'],
            [['format', 'phone_email'], 'string', 'max' => 800],
            [['contact', 'dg_code'], 'string', 'max' => 255]
        ]);
    }
	
}
