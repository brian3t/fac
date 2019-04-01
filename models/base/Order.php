<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $mp_id
 * @property string $channel_refnum
 * @property integer $retailops_order_id
 * @property string $last_mp_updated
 * @property string $rop_ack_at
 * @property string $last_rop_pull
 * @property integer $force_rop_resend
 * @property integer $count_rop_pull
 * @property string $channel_date_created
 * @property string $shipping_amt
 * @property string $tax_amt
 * @property string $first_name
 * @property string $last_name
 * @property string $company
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state_match
 * @property string $country_match
 * @property string $postal_code
 * @property string $gift_message
 * @property string $phone
 * @property string $ship_first_name
 * @property string $ship_last_name
 * @property string $ship_company
 * @property string $ship_address1
 * @property string $ship_address2
 * @property string $ship_city
 * @property string $ship_state_match
 * @property string $ship_country_match
 * @property string $ship_postal_code
 * @property string $ship_phone
 * @property string $pay_type
 * @property string $pay_transaction_id
 * @property string $comments
 * @property string $product_total
 * @property integer $customer_id
 * @property double $discount_amt
 * @property string $grand_total
 * @property string $ship_service_code
 * @property string $ip_address
 * @property string $status
 * @property string $attributes
 * @property string $other_info
 *
 * @property \app\models\Mp $mp
 * @property \app\models\Customer $customer
 * @property \app\models\OrderItem[] $orderItems
 * @property \app\models\OrderPayment[] $orderPayments
 * @property $calc_mode
 * @property $bill_addr
 * @property $ship_addr
 * @property \app\models\OrderReturn[] $orderReturns
 * @property \app\models\OrderShipment[] $orderShipments
 */
class Order extends \yii\db\ActiveRecord
{
    
    use \mootensai\relation\RelationTrait;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mp_id', 'channel_refnum'], 'required'],
            [['mp_id', 'retailops_order_id', 'force_rop_resend', 'count_rop_pull', 'customer_id'], 'integer'],
            [['last_mp_updated', 'rop_ack_at', 'last_rop_pull', 'channel_date_created'], 'safe'],
            [['shipping_amt', 'tax_amt', 'product_total', 'discount_amt', 'grand_total'], 'number'],
            [['comments'], 'string'],
            [['channel_refnum', 'status'], 'string', 'max' => 50],
            [['first_name', 'company', 'email', 'address1', 'address2', 'city', 'state_match', 'country_match', 'postal_code', 'phone', 'ship_first_name', 'ship_company', 'ship_address1', 'ship_address2', 'ship_city', 'ship_state_match', 'ship_country_match', 'ship_postal_code', 'ship_phone', 'pay_type', 'pay_transaction_id', 'ship_service_code', 'attributes'], 'string', 'max' => 255],
            [['last_name', 'ship_last_name'], 'string', 'max' => 80],
            [['gift_message'], 'string', 'max' => 800],
            [['ip_address'], 'string', 'max' => 200],
            [['other_info'], 'string', 'max' => 2000],
            [['mp_id', 'channel_refnum'], 'unique', 'targetAttribute' => ['mp_id', 'channel_refnum'], 'message' => 'The combination of Mp ID and Mp Reference Number has already been taken.']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mp_id' => 'Mp ID',
            'channel_refnum' => 'Mp Ref#',
            'retailops_order_id' => 'Rop Order ID',
            'last_mp_updated' => 'Last Mp Updated',
            'rop_ack_at' => 'ROP Acknowledged at',
            'last_rop_pull' => 'Last Rop Pull',
            'force_rop_resend' => 'Force Rop Resend',
            'count_rop_pull' => 'Count Rop Pull',
            'channel_date_created' => 'Channel Datetime Created',
            'shipping_amt' => 'Shipping Σ',
            'tax_amt' => 'Tax Σ',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'company' => 'Company',
            'email' => 'Email',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state_match' => 'State',
            'country_match' => 'Country',
            'postal_code' => 'Postal Code',
            'gift_message' => 'Gift Message',
            'phone' => 'Phone',
            'ship_first_name' => 'Ship First Name',
            'ship_last_name' => 'Ship Last Name',
            'ship_company' => 'Ship Company',
            'ship_address1' => 'Ship Address1',
            'ship_address2' => 'Ship Address2',
            'ship_city' => 'Ship City',
            'ship_state_match' => 'Ship State',
            'ship_country_match' => 'Ship Country',
            'ship_postal_code' => 'Ship Postal Code',
            'ship_phone' => 'Ship Phone',
            'pay_type' => 'Pay Type',
            'pay_transaction_id' => 'Pay Transaction ID',
            'comments' => 'Comments',
            'product_total' => 'Product Σ',
            'customer_id' => 'Customer ID',
            'discount_amt' => 'Discount Amt',
            'grand_total' => 'Grand Σ',
            'ship_service_code' => 'Ship Service Code',
            'ip_address' => 'Ip Address',
            'status' => 'Status',
            'attributes' => 'Attributes',
            'other_info' => 'Other Info',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMp()
    {
        return $this->hasOne(\app\models\Mp::className(), ['id' => 'mp_id'])->inverseOf('orders');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\app\models\Customer::className(), ['id' => 'customer_id'])->inverseOf('orders');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\app\models\OrderItem::className(), ['order_id' => 'id'])->inverseOf('order');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderPayments()
    {
        return $this->hasMany(\app\models\OrderPayment::className(), ['order_id' => 'id'])->inverseOf('order');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderReturns()
    {
        return $this->hasMany(\app\models\OrderReturn::className(), ['order_id' => 'id'])->inverseOf('order');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipments()
    {
        return $this->hasMany(\app\models\OrderShipment::className(), ['order_id' => 'id'])->inverseOf('order');
    }
    
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' =>
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'last_mp_updated',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * @inheritdoc
     * @return \app\models\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderQuery(get_called_class());
    }
    
    public function getName()
    {
        return "{$this->id} - {$this->ship_first_name} - {$this->channel_date_created}";
    }
    
    public function getCalc_mode()
    {
        return 'order';
    }
    
    public function getBill_addr()
    {
        return ['first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company' => $this->company,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state_match' => strtoupper($this->state_match),
            'country_match' => strtoupper($this->country_match),
            'postal_code' => $this->postal_code
        ];
    }
    
    public function getShip_addr()
    {
        return [
            'first_name' => $this->ship_first_name,
            'last_name' => $this->ship_last_name,
            'company' => $this->ship_company,
            'address1' => $this->ship_address1,
            'address2' => $this->ship_address2,
            'city' => $this->ship_city,
            'state_match' => strtoupper($this->ship_state_match),
            'country_match' => strtoupper($this->ship_country_match),
            'postal_code' => $this->ship_postal_code
        ];
    }
    
}
