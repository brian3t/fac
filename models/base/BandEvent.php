<?php

namespace app\models\base;

/**
 * This is the base model class for table "band_event".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $band_id
 * @property integer $event_id
 * @property integer $created_by
 *
 * @property \app\models\Band $band
 * @property \app\models\Event $event
 */
class BandEvent extends \yii\db\ActiveRecord
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
            'event'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['band_id', 'event_id'], 'required'],
            [['band_id', 'event_id', 'created_by'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'band_event';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'band_id' => 'Band ID',
            'event_id' => 'Event ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBand()
    {
        return $this->hasOne(\app\models\Band::className(), ['id' => 'band_id'])->inverseOf('bandEvents');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(\app\models\Event::className(), ['id' => 'event_id'])->inverseOf('bandEvents');
    }
    }
