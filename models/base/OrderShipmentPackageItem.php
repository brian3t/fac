<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_shipment_package_item".
 *
 * @property integer $id
 * @property integer $order_shipment_package_id
 * @property integer $retailops_order_item_id
 * @property integer $retailops_shipment_item_id
 * @property integer $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property string $sku
 * @property string $rop_channel_item_refnum
 *
 * @property \app\models\OrderShipmentPackage $orderShipmentPackage
 * @property \app\models\OrderItem $orderItem
 */
class OrderShipmentPackageItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_shipment_package_id'], 'required'],
            [['order_shipment_package_id', 'retailops_order_item_id', 'retailops_shipment_item_id', 'quantity'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sku'], 'string', 'max' => 40],
            [['rop_channel_item_refnum'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_shipment_package_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_shipment_package_id' => 'Order Shipment Package ID',
            'retailops_order_item_id' => 'Retailops Order Item ID',
            'retailops_shipment_item_id' => 'Retailops Shipment Item ID',
            'quantity' => 'Quantity',
            'sku' => 'Sku',
            'rop_channel_item_refnum' => 'Rop Channel Item Refnum',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipmentPackage()
    {
        return $this->hasOne(\app\models\OrderShipmentPackage::className(), ['id' => 'order_shipment_package_id'])->inverseOf('orderShipmentPackageItems');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItem()
    {
        return $this->hasOne(\app\models\OrderItem::className(), ['sku' => 'sku'])->inverseOf('orderShipmentPackageItems');
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
