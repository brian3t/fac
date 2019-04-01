<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_item".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $sku
 * @property string $sku_description
 * @property string $options
 * @property string $unit_price
 * @property string $discount_amt
 * @property string $discount_pct
 * @property string $recycling_amt
 * @property string $ship_amt
 * @property string $shiptax_amt
 * @property string $unit_tax
 * @property string $unit_tax_pct
 * @property string $vat_pct
 * @property integer $quantity
 * @property string $item_type
 * @property string $status
 * @property string $last_mp_updated
 * @property string $mp_item_id
 * @property string $extra_info
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Order $order
 * @property \app\models\OrderReturnItem[] $orderReturnItems
 * @property \app\models\OrderShipmentPackageItem[] $orderShipmentPackageItems
 */
class OrderItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'sku'], 'required'],
            [['order_id', 'quantity'], 'integer'],
            [['unit_price', 'discount_amt', 'discount_pct', 'recycling_amt', 'ship_amt', 'shiptax_amt', 'unit_tax', 'unit_tax_pct', 'vat_pct'], 'number'],
            [['item_type'], 'string'],
            [['last_mp_updated', 'created_at', 'updated_at'], 'safe'],
            [['sku'], 'string', 'max' => 255],
            [['sku_description', 'extra_info'], 'string', 'max' => 800],
            [['options'], 'string', 'max' => 2550],
            [['status'], 'string', 'max' => 250],
            [['mp_item_id'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'sku' => 'Sku',
            'sku_description' => 'Sku Description',
            'options' => 'Options',
            'unit_price' => 'Unit Price',
            'discount_amt' => 'Discount Amt',
            'discount_pct' => 'Discount Pct',
            'recycling_amt' => 'Recycling Amt',
            'ship_amt' => 'Ship Amt',
            'shiptax_amt' => 'Shiptax Amt',
            'unit_tax' => 'Unit Tax',
            'unit_tax_pct' => 'Unit Tax Pct',
            'vat_pct' => 'Vat Pct',
            'quantity' => 'Quantity',
            'item_type' => 'Item Type',
            'status' => 'Status',
            'last_mp_updated' => 'Last Mp Updated',
            'mp_item_id' => 'Mp Item ID',
            'extra_info' => 'Extra Info',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['id' => 'order_id'])->inverseOf('orderItems');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderReturnItems()
    {
        return $this->hasMany(\app\models\OrderReturnItem::className(), ['sku' => 'sku'])->inverseOf('orderItem');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipmentPackageItems()
    {
        return $this->hasMany(\app\models\OrderShipmentPackageItem::className(), ['sku' => 'sku'])->inverseOf('orderItem');
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
     * @return \app\models\OrderItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderItemQuery(get_called_class());
    }
}
