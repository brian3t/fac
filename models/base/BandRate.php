<?php

namespace app\models\base;

/**
 * This is the base model class for table "band_rate".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $band_id
 * @property string $rate
 * @property string $comment
 *
 * @property \app\models\Band $band
 * @property \app\models\User $user
 */
class BandRate extends \yii\db\ActiveRecord
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
            [['user_id', 'band_id'], 'integer'],
            [['rate'], 'number'],
            [['comment'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'band_rate';
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
            'rate' => 'Rate',
            'comment' => 'Comment',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBand()
    {
        return $this->hasOne(\app\models\Band::className(), ['id' => 'band_id'])->inverseOf('bandRates');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('bandRates');
    }
    }
