<?php

namespace app\models;

use app\models\base\Company as BaseCompany;

/**
 * This is the model class for table "company".
 */
class Company extends BaseCompany
{
    public static $order_by_col='name';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return parent::rules();
    }
    
    // public function getCompanyUsersFullInfo(){
    //     $query= $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('company_user', ['company_id'=>'id'])
    //         ->joinWith('profile')
    //         ->addSelect(['*', "profile.name AS name"]);
    //     return $query->asArray();
    // }

    // public function fields()
    // {
    //
    //     $parent_fields = parent::fields();
    //     unset($parent_fields['user']);
    //     return array_merge($parent_fields, ['user'=>function($model){
    //         $user_full = $model->companyUsersFullInfo;
    //         foreach ($user_full as $index=>$company){
    //             unset($user_full[$index]['profile']);
    //         }
    //         return $user_full;
    //     }]);
    // }

    public function beforeSave($insert)
    {
        if (empty($this->line_of_business)){
            $this->line_of_business = null;
        }
        return parent::beforeSave($insert);
    }
}
