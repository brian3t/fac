<?php

namespace app\models;

use Yii;
use \app\models\base\UserGroup as BaseUserGroup;

/**
 * This is the model class for table "user_group".
 */
class UserGroup extends BaseUserGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'logo'], 'string', 'max' => 255]
        ]);
    }
	
}
