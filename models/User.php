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
        return $this->username;
    }

}
