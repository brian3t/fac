<?php

namespace app\models;

use Yii;
use \app\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    public static $order_by_col = 'first_name';

    public function getName()
    {
        $name_or_username = implode(' ', [$this->first_name, $this->last_name]);
        if (empty($name_or_username)) {
            $name_or_username = $this->username;
        }
        return $name_or_username;
    }

}
