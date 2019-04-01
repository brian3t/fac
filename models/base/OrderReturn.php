<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_return".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $retailops_return_id
 * @property string $retailops_rma_id
 * @property double $product_amt
 * @property double $subtotal_amt
 * @property double $discount_amt
 * @property double $shipping_amt
 * @property double $tax_amt
 * @property double $refund_amt
 * @property string $refund_action
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Order $order
 * @property \app\models\OrderReturnItem[] $orderReturnItems
 */
class OrderReturn extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'retailops_return_id'], 'integer'],
            [['product_amt', 'subtotal_amt', 'discount_amt', 'shipping_amt', 'tax_amt', 'refund_amt'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['retailops_rma_id'], 'string', 'max' => 80],
            [['refund_action'], 'string', 'max' => 24]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_return';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'retailops_return_id' => 'Retailops Return ID',
            'retailops_rma_id' => 'Retailops Rma ID',
            'product_amt' => 'Product Amt',
            'subtotal_amt' => 'Subtotal Amt',
            'discount_amt' => 'Discount Amt',
            'shipping_amt' => 'Shipping Amt',
            'tax_amt' => 'Tax Amt',
            'refund_amt' => 'Refund Amt',
            'refund_action' => 'Refund Action',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['id' => 'order_id'])->inverseOf('orderReturns');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderReturnItems()
    {
        return $this->hasMany(\app\models\OrderReturnItem::className(), ['order_return_id' => 'id'])->inverseOf('orderReturn');
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
}
