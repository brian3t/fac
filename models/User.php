<?php

namespace app\models;

use app\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 * Note: this is not being used for RAW USER
 */
class User extends BaseUser {
//    private $_union_memberships;
    public static $order_by_col='first_name';
    /**
     * @inheritdoc
     */
    public function rules() {
        return parent::rules();
    }


    public function getName() {
        return $this->username;
    }

   
    public function fields() {
        $parent_fields = parent::fields();
        $parent_fields = array_diff($parent_fields,
            ['password_hash', 'registration_ip', 'unconfirmed_email', 'blocked_at', 'updated_at']);
        return array_merge($parent_fields, [
            'name',
        ]);
    }

    public function beforeValidate() {
        return parent::beforeValidate();
    }

}
