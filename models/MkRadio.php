<?php

namespace app\models;

use app\models\base\MkRadio as BaseMkRadio;

/**
 * This is the model class for table "mk_radio".
 */
class MkRadio extends BaseMkRadio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['marketing_id', 'company_id', 'gross'], 'required'],
            [['marketing_id', 'company_id', 'promo_mentions', 'promo_tickets', 'paid_spots'], 'integer'],
            [['promo_value', 'gross', 'net'], 'number'],
            [['promo_run_from', 'promo_run_to', 'paid_run_from', 'paid_run_to'], 'safe'],
            [['station', 'format'], 'string', 'max' => 800],
            [['contact', 'contact_phone_email', 'thirty', 'sixty'], 'string', 'max' => 255]
        ]);
    }
	
}
