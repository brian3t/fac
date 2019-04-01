<?php

namespace app\models\base;

/**
 * This is the base model class for table "tracking".
 *
 * @property integer $id
 * @property integer $retailops_order_id
 * @property string $sku
 * @property string $tracking_number
 * @property string $tracking_carrier
 * @property string $ship_date
 *
 * @property \app\models\Order $order
 */
class Tracking extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['retailops_order_id'], 'integer'],
            [['ship_date'], 'safe'],
            [['sku', 'tracking_number', 'tracking_carrier'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tracking';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'retailops_order_id' => 'Rop Order ID',
            'sku' => 'Sku',
            'tracking_number' => 'Tracking Number',
            'tracking_carrier' => 'Tracking Carrier',
            'ship_date' => 'Ship Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['retailops_order_id' => 'retailops_order_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\TrackingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TrackingQuery(get_called_class());
    }
}
