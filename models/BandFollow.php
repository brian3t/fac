<?php

namespace app\models;

use app\models\base\BandFollow as BaseBandFollow;

/**
 * This is the model class for table "band_follow".
 */
class BandFollow extends BaseBandFollow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'band_id'], 'required'],
            [['user_id', 'band_id'], 'integer']
        ]);
    }
	
}
