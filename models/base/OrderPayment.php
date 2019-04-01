<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_payment".
 *
 * @property integer $id
 * @property integer $order_id
 * @property float $amount
 * @property string $payment_processing_type
 * @property string $transaction_type
 * @property string $payment_type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $payment_series_id
 *
 * @property \app\models\Order $order
 */
class OrderPayment extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'payment_series_id'], 'integer'],
            [['amount'], 'number'],
            [['payment_processing_type', 'transaction_type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['payment_type'], 'string', 'max' => 60],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_payment';
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'amount' => 'Amount',
            'payment_processing_type' => 'Payment Processing Type',
            'transaction_type' => 'Transaction Type',
            'payment_type' => 'Payment Type',
            'payment_series_id' => 'Payment Series ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['id' => 'order_id'])->inverseOf('orderPayments');
    }
    
    /**
     * @inheritdoc
     * @return mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * @inheritdoc
     * @return \app\models\OrderPaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderPaymentQuery(get_called_class());
    }
}
