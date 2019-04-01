<?php

namespace app\models\base;

/**
 * This is the base model class for table "order_return_item".
 *
 * @property integer $id
 * @property integer $order_return_id
 * @property integer $retailops_item_id
 * @property string $channel_item_refnum
 * @property string $sku
 * @property integer $quantity
 * @property string $reason
 * @property double $item_shipping_tax_amt
 * @property double $tax_amt
 * @property double $shipping_amt
 * @property double $restock_fee_amt
 * @property double $giftwrap_amt
 * @property double $giftwrap_tax_amt
 * @property double $product_amt
 * @property double $recycling_amt
 * @property double $subtotal_amt
 * @property double $credit_amt
 *
 * @property \app\models\OrderReturn $orderReturn
 * @property \app\models\OrderItem $orderItem
 */
class OrderReturnItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_return_id', 'retailops_item_id', 'channel_item_refnum', 'sku', 'quantity', 'product_amt'], 'required'],
            [['order_return_id', 'retailops_item_id', 'quantity'], 'integer'],
            [['item_shipping_tax_amt', 'tax_amt', 'shipping_amt', 'restock_fee_amt', 'giftwrap_amt', 'giftwrap_tax_amt', 'product_amt', 'recycling_amt', 'subtotal_amt', 'credit_amt'], 'number'],
            [['channel_item_refnum', 'sku'], 'string', 'max' => 40],
            [['reason'], 'string', 'max' => 80]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_return_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_return_id' => 'Order Return ID',
            'retailops_item_id' => 'Retailops Item ID',
            'channel_item_refnum' => 'Channel Item Refnum',
            'sku' => 'Sku',
            'quantity' => 'Quantity',
            'reason' => 'Reason',
            'item_shipping_tax_amt' => 'Item Shipping Tax Amt',
            'tax_amt' => 'Tax Amt',
            'shipping_amt' => 'Shipping Amt',
            'restock_fee_amt' => 'Restock Fee Amt',
            'giftwrap_amt' => 'Giftwrap Amt',
            'giftwrap_tax_amt' => 'Giftwrap Tax Amt',
            'product_amt' => 'Product Amt',
            'recycling_amt' => 'Recycling Amt',
            'subtotal_amt' => 'Subtotal Amt',
            'credit_amt' => 'Credit Amt',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderReturn()
    {
        return $this->hasOne(\app\models\OrderReturn::className(), ['id' => 'order_return_id'])->inverseOf('orderReturnItems');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItem()
    {
        return $this->hasOne(\app\models\OrderItem::className(), ['sku' => 'sku'])->inverseOf('orderReturnItems');
    }
}
