<?php

namespace app\models\base;

/**
 * This is the base model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 * @property string $first_name
 * @property string $last_name
 * @property string $note
 * @property string $phone_number_type
 * @property string $phone_number
 * @property string $birthdate
 * @property integer $birth_month
 * @property integer $birth_year
 * @property string $favorite_genres
 * @property string $favorite_venue_types
 * @property string $website_url
 * @property string $twitter_id
 * @property string $facebook_id
 * @property string $instagram_id
 * @property string $google_id
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $country
 * @property integer $last_login_at
 *
 * @property \app\models\Band[] $bands
 * @property \app\models\BandComment[] $bandComments
 * @property \app\models\BandFollow[] $bandFollows
 * @property \app\models\BandRate[] $bandRates
 * @property \app\models\Event[] $events
 * @property \app\models\UserEvent[] $userEvents
 * @property \app\models\Venue[] $venues
 */
class User extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'bands',
            'bandComments',
            'bandFollows',
            'bandRates',
            'events',
            'userEvents',
            'venues'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags', 'birth_year', 'last_login_at'], 'integer'],
            [['phone_number_type', 'favorite_genres', 'favorite_venue_types'], 'string'],
            [['birthdate'], 'safe'],
            [['username', 'email', 'unconfirmed_email', 'city'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'twitter_id', 'facebook_id', 'instagram_id', 'google_id', 'state', 'country'], 'string', 'max' => 80],
            [['note', 'address1'], 'string', 'max' => 2000],
            [['phone_number', 'zipcode'], 'string', 'max' => 20],
            [['birth_month'], 'string', 'max' => 3],
            [['website_url'], 'string', 'max' => 400],
            [['address2'], 'string', 'max' => 800],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'confirmed_at' => 'Confirmed At',
            'unconfirmed_email' => 'Unconfirmed Email',
            'blocked_at' => 'Blocked At',
            'registration_ip' => 'Registration Ip',
            'flags' => 'Flags',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'note' => 'Note',
            'phone_number_type' => 'Phone Number Type',
            'phone_number' => 'Phone Number',
            'birthdate' => 'Birthdate',
            'birth_month' => 'Birth Month',
            'birth_year' => 'Birth Year',
            'favorite_genres' => 'Favorite Genres',
            'favorite_venue_types' => 'Favorite Venue Types',
            'website_url' => 'Website Url',
            'twitter_id' => 'Twitter ID',
            'facebook_id' => 'Facebook ID',
            'instagram_id' => 'Instagram ID',
            'google_id' => 'Google ID',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'last_login_at' => 'Last Login At',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBands()
    {
        return $this->hasMany(\app\models\Band::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandComments()
    {
        return $this->hasMany(\app\models\BandComment::className(), ['created_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandFollows()
    {
        return $this->hasMany(\app\models\BandFollow::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandRates()
    {
        return $this->hasMany(\app\models\BandRate::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(\app\models\Event::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEvents()
    {
        return $this->hasMany(\app\models\UserEvent::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenues()
    {
        return $this->hasMany(\app\models\Venue::className(), ['user_id' => 'id']);
    }
    }
