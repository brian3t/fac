<?php

namespace app\models;

use app\models\base\BandComment as BaseBandComment;

/**
 * This is the model class for table "band_comment".
 */
class BandComment extends BaseBandComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'band_id'], 'required'],
            [['created_by', 'band_id'], 'integer'],
            [['comment'], 'string', 'max' => 800]
        ]);
    }
	
}
