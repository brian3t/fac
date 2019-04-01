<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "order_shipment".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $retailops_shipment_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Order $order
 * @property \app\models\OrderShipmentPackage[] $orderShipmentPackages
 */
class OrderShipment extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'retailops_shipment_id'], 'required'],
            [['order_id', 'retailops_shipment_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['retailops_shipment_id'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_shipment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'retailops_shipment_id' => 'Retailops Shipment ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['id' => 'order_id'])->inverseOf('orderShipments');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderShipmentPackages()
    {
        return $this->hasMany(\app\models\OrderShipmentPackage::className(), ['order_shipment_id' => 'id'])->inverseOf('orderShipment');
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
