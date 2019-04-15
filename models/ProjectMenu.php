<?php

namespace app\models;

use app\models\base\ProjectMenu as BaseProjectMenu;

/**
 * This is the model class for table "project_menu".
 */
class ProjectMenu extends BaseProjectMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['page_id'], 'required'],
            [['page_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
