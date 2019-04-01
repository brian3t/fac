<?php

namespace app\models\base;

/**
 * This is the base model class for table "marketing".
 *
 * @property integer $id
 * @property integer $offer_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $graphic_artist
 * @property string $newsprint
 * @property string $internet
 * @property string $street_team
 * @property string $printing
 * @property string $billboards
 * @property string $spots
 * @property string $admat
 * @property string $postage
 * @property string $others
 *
 * @property \app\models\User $user
 * @property \app\models\Offer $offer
 * @property \app\models\MkRadio[] $mkRadios
 * @property \app\models\MkTelevision[] $mkTelevisions
 */
class Marketing extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'user',
            'offer',
            'mkRadios',
            'mkTelevisions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'user_id'], 'required'],
            [['offer_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['graphic_artist', 'newsprint', 'internet', 'street_team', 'printing', 'billboards', 'spots', 'admat', 'postage', 'others'], 'number'],
            [['offer_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marketing';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offer_id' => 'Offer ID',
            'user_id' => 'User ID',
            'graphic_artist' => 'Graphic Artist',
            'newsprint' => 'Newsprint',
            'internet' => 'Internet',
            'street_team' => 'Street Team',
            'printing' => 'Printing',
            'billboards' => 'Billboards',
            'spots' => 'Spots',
            'admat' => 'Admat',
            'postage' => 'Postage',
            'others' => 'Others',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('marketings');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(\app\models\Offer::className(), ['id' => 'offer_id'])->inverseOf('marketing');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMkRadios()
    {
        return $this->hasMany(\app\models\MkRadio::className(), ['marketing_id' => 'id'])->inverseOf('marketing');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMkTelevisions()
    {
        return $this->hasMany(\app\models\MkTelevision::className(), ['marketing_id' => 'id'])->inverseOf('marketing');
    }
    }
