<?php

namespace app\models\base;

/**
 * This is the base model class for table "user_event".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $is_going
 * @property string $comment
 *
 * @property \app\models\Event $event
 * @property \app\models\User $user
 */
class UserEvent extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'event',
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
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'event_id'], 'integer'],
            [['is_going'], 'string', 'max' => 4],
            [['comment'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_event';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'event_id' => 'Event ID',
            'is_going' => 'Is Going',
            'comment' => 'Comment',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(\app\models\Event::className(), ['id' => 'event_id'])->inverseOf('userEvents');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('userEvents');
    }
    }
