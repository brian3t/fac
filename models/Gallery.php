<?php

namespace app\models;

use app\models\base\Gallery as BaseGallery;

/**
 * This is the model class for table "gallery".
 */
class Gallery extends BaseGallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['file_path'], 'required'],
            [['microsite_id', 'project_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['file_path'], 'string', 'max' => 800]
        ]);
    }
	
}
