<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "inventory_detail".
 *
 * @property integer $id
 * @property string $quantity_type
 * @property integer $inventory_id
 * @property string $estimated_availability_date
 * @property integer $available_quantity
 * @property integer $total_quantity
 * @property string $vendor_name
 * @property string $po
 * @property string $po_destination
 * @property string $facility_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Inventory $inventory
 */
class InventoryDetail extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity_type'], 'string'],
            [['inventory_id'], 'required'],
            [['inventory_id', 'available_quantity', 'total_quantity'], 'integer'],
            [['estimated_availability_date', 'created_at', 'updated_at'], 'safe'],
            [['vendor_name', 'facility_name'], 'string', 'max' => 200],
            [['po'], 'string', 'max' => 80],
            [['po_destination'], 'string', 'max' => 400]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_detail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity_type' => 'Quantity Type',
            'inventory_id' => 'Inventory ID',
            'estimated_availability_date' => 'Estimated Availability Date',
            'available_quantity' => 'Available Quantity',
            'total_quantity' => 'Total Quantity',
            'vendor_name' => 'Vendor Name',
            'po' => 'Po',
            'po_destination' => 'Po Destination',
            'facility_name' => 'Facility Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventory()
    {
        return $this->hasOne(\app\models\Inventory::className(), ['id' => 'inventory_id']);
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
