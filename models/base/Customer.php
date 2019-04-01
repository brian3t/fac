<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "customer".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $email_address
 * @property string $phone_number
 * @property string $mp_customer_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'email_address', 'mp_customer_id'], 'string', 'max' => 255],
            [['last_name'], 'string', 'max' => 80],
            [['company'], 'string', 'max' => 800],
            [['phone_number'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'company' => 'Company',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'mp_customer_id' => 'Mp Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\app\models\Order::className(), ['customer_id' => 'id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CustomerQuery(get_called_class());
    }
}
