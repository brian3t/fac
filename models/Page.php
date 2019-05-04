<?php

namespace app\models;

use app\models\base\Page as BasePage;
use usv\yii2helper\models\ModelB3tTrait;

/**
 * This is the model class for table "page".
 */
class Page extends BasePage
{
    use ModelB3tTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'microsite_id'], 'integer'],
            [['type', 'html'], 'string'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
