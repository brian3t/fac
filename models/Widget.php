<?php

namespace app\models;

use app\models\base\Widget as BaseWidget;

/**
 * This is the model class for table "widget".
 */
class Widget extends BaseWidget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id'], 'integer'],
            [['name', 'shortcode'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 8000]
        ]);
    }
	
}
