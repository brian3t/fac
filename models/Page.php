<?php

namespace app\models;

use app\models\base\Page as BasePage;

/**
 * This is the model class for table "page".
 */
class Page extends BasePage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'microsite_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
