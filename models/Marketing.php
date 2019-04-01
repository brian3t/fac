<?php

namespace app\models;

use app\models\base\Marketing as BaseMarketing;

/**
 * This is the model class for table "marketing".
 */
class Marketing extends BaseMarketing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['offer_id', 'user_id'], 'required'],
            [['offer_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['graphic_artist', 'newsprint', 'internet', 'street_team', 'printing', 'billboards', 'spots', 'admat', 'postage', 'others'], 'number'],
            [['offer_id'], 'unique']
        ]);
    }
	
}
