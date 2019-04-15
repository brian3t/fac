<?php

namespace app\models\base;

/**
 * This is the base model class for table "listing".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $address1
 * @property string $address2
 * @property string $country_code
 * @property string $city
 * @property string $district
 * @property string $area
 * @property string $property_type
 * @property integer $developer_id
 * @property string $postal_code
 * @property integer $total_unit
 * @property string $tenure
 *
 * @property \app\models\Microsite[] $microsites
 */
class Listing extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'microsite'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['city', 'property_type', 'tenure'], 'string'],
            [['developer_id', 'total_unit'], 'integer'],
            [['name', 'district'], 'string', 'max' => 100],
            [['address1', 'address2', 'area'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 2],
            [['postal_code'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'listing';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'country_code' => 'Country Code',
            'city' => 'City',
            'district' => 'District',
            'area' => 'Area',
            'property_type' => 'Property Type',
            'developer_id' => 'Developer ID',
            'postal_code' => 'Postal Code',
            'total_unit' => 'Total Unit',
            'tenure' => 'Tenure',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMicrosite()
    {
        return $this->hasOne(\app\models\Microsite::className(), ['listing_id' => 'id'])->inverseOf('listing');
    }
    }
