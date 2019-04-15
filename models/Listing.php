<?php

namespace app\models;

use app\models\base\Listing as BaseListing;

/**
 * This is the model class for table "listing".
 */
class Listing extends BaseListing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['city', 'property_type', 'tenure'], 'string'],
            [['developer_id', 'total_unit'], 'integer'],
            [['name', 'district'], 'string', 'max' => 100],
            [['address1', 'address2', 'area'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 2],
            [['postal_code'], 'string', 'max' => 15]
        ]);
    }
	
}
