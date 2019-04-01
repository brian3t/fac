<?php

namespace app\models;

use app\models\base\BandRate as BaseBandRate;

/**
 * This is the model class for table "band_rate".
 */
class BandRate extends BaseBandRate
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
            [['user_id', 'band_id'], 'integer'],
            [['rate'], 'number'],
            [['comment'], 'string', 'max' => 800]
        ]);
    }
	
}
