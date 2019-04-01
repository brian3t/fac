<?php

namespace app\models;

use app\models\base\Profile as BaseProfile;

/**
 * This is the model class for table "profile".
 */
class Profile extends BaseProfile
{
    public static $order_by_col='name';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 800],
            [['gravatar_id'], 'string', 'max' => 32]
        ]);
    }
	
}
