<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_shipment_package".
 *
 * @property integer $id
 * @property integer $order_shipment_id
 * @property integer $retailops_package_id
 * @property string $carrier_name
 * @property string $carrier_class_name
 * @property string $channel_ship_code
 * @property string $tracking_number
 * @property double $weight_kg
 * @property string $date_shipped
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\OrderShipment $orderShipment
 * @property \app\models\OrderShipmentPackageItem[] $orderShipmentPackageItems
 */
class OrderShipmentPackage extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_shipment_id', 'retailops_package_id'], 'required'],
            [['order_shipment_id', 'retailops_package_id'], 'integer'],
            [['weight_kg'], 'number'],
            [['date_shipped', 'created_at', 'updated_at'], 'safe'],
            [['carrier_name'], 'string', 'max' => 200],
            [['carrier_class_name', 'channel_ship_code'], 'string', 'max' => 40],
            [['tracking_number'], 'string', 'max' => 30],
            [['tracking_number'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_shipment_package';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_shipment_id' => 'Order Shipment ID',
            'retailops_package_id' => 'Retailops Package ID',
            'carrier_name' => 'Carrier Name',
            'carrier_class_name' => 'Carrier Class Name',
            'channel_ship_code' => 'Channel Ship Code',
            'tracking_number' => 'Tracking Number',
            'weight_kg' => 'Weight Kg',
            'date_shipped' => 'Date Shipped',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipment()
    {
        return $this->hasOne(\app\models\OrderShipment::className(), ['id' => 'order_shipment_id'])->inverseOf('orderShipmentPackages');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipmentPackageItems()
    {
        return $this->hasMany(\app\models\OrderShipmentPackageItem::className(), ['order_shipment_package_id' => 'id'])->inverseOf('orderShipmentPackage');
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
