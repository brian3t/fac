<?php

namespace app\models;

use app\models\base\MicrositeMenu as BaseMicrositeMenu;

/**
 * This is the model class for table "microsite_menu".
 */
class MicrositeMenu extends BaseMicrositeMenu
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
            [['name'], 'string', 'max' => 255],
            [['order'], 'string', 'max' => 2]
        ]);
    }
	
}
