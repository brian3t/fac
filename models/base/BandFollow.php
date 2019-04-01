<?php

namespace app\models\base;

/**
 * This is the base model class for table "band_follow".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $band_id
 *
 * @property \app\models\Band $band
 * @property \app\models\User $user
 */
class BandFollow extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'band',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'band_id'], 'required'],
            [['user_id', 'band_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'band_follow';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'band_id' => 'Band ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBand()
    {
        return $this->hasOne(\app\models\Band::className(), ['id' => 'band_id'])->inverseOf('bandFollows');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('bandFollows');
    }
    }
