<?php

namespace app\models\base;

/**
 * This is the base model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $avatar
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 *
 * @property \app\models\User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 800],
            [['gravatar_id'], 'string', 'max' => 32]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'public_email' => 'Public Email',
            'avatar' => 'Avatar',
            'gravatar_email' => 'Gravatar Email',
            'gravatar_id' => 'Gravatar ID',
            'location' => 'Location',
            'website' => 'Website',
            'bio' => 'Bio',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('profile');
    }
    }
