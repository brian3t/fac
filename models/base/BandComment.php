<?php

namespace app\models\base;

/**
 * This is the base model class for table "band_comment".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $band_id
 * @property string $comment
 *
 * @property \app\models\Band $band
 * @property \app\models\User $createdBy
 */
class BandComment extends \yii\db\ActiveRecord
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
            'createdBy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'band_id'], 'required'],
            [['created_by', 'band_id'], 'integer'],
            [['comment'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'band_comment';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'band_id' => 'Band ID',
            'comment' => 'Comment',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBand()
    {
        return $this->hasOne(\app\models\Band::className(), ['id' => 'band_id'])->inverseOf('bandComments');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'created_by'])->inverseOf('bandComments');
    }
    }
