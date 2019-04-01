<?php

namespace app\models\base;

/**
 * This is the base model class for table "inventory_mp".
 *
 * @property integer $mp_id
 * @property string $sku
 *
 * @property \app\models\Inventory $sku0
 * @property \app\models\Mp $mp
 */
class InventoryMp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mp_id'], 'required'],
            [['mp_id'], 'integer'],
            [['sku'], 'string', 'max' => 45],
            [['mp_id', 'sku'], 'unique', 'targetAttribute' => ['mp_id', 'sku'], 'message' => 'The combination of Mp ID and Sku has already been taken.']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_mp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mp_id' => 'Mp ID',
            'sku' => 'Sku',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSku0()
    {
        return $this->hasOne(\app\models\Inventory::className(), ['sku' => 'sku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMp()
    {
        return $this->hasOne(\app\models\Mp::className(), ['id' => 'mp_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\InventoryMpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\InventoryMpQuery(get_called_class());
    }
}
