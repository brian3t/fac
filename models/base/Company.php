<?php

namespace app\models\base;

/**
 * This is the base model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $website
 * @property string $headline
 * @property string $industry
 * @property string $phone_number
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $num_of_employee
 * @property integer $annual_revenue
 * @property integer $facebook_fans
 * @property string $twitter_handle
 * @property integer $twitter_followers
 * @property string $timezone
 * @property string $description
 * @property string $line_of_business
 * @property string $general_email
 * @property string $country
 * @property string $work_phone
 * @property string $fax
 * @property string $webpage
 * @property string $facebook
 * @property string $linkedin_company_page
 * @property string $yahoo
 * @property string $twitter
 * @property string $instagram
 * @property string $google
 * @property string $note
 * @property integer $belong_company_id
 *
 * @property \app\models\Company $belongCompany
 * @property \app\models\Company $usersBelongToThis
 * @property \app\models\Company[] $companies
 * @property \app\models\MkRadio[] $mkRadios 
 * @property \app\models\MkTelevision[] $mkTelevisions 
 * @property \app\models\Offer[] $offers
 * @property \app\models\Settlement[] $settlements
 * @property \app\models\User[] $users
 * @property \app\models\Venue[] $venues
 * @property \app\models\Venue[] $venuesBelongToThis
 * @property \app\models\Venue[] $settlementsBelongToThis
 */
class Company extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['annual_revenue', 'facebook_fans', 'twitter_followers', 'belong_company_id'], 'integer'],            [['timezone', 'line_of_business'], 'string'],
            [['name', 'website'], 'string', 'max' => 200],
            [['headline'], 'string', 'max' => 400],
            [['industry', 'state', 'twitter_handle', 'linkedin_company_page'], 'string', 'max' => 80],
            [['phone_number'], 'string', 'max' => 20],
            [['address1', 'address2', 'general_email', 'country', 'twitter'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 60],
            [['postal_code'], 'string', 'max' => 10],
            [['num_of_employee'], 'string', 'max' => 30],
            [['description', 'webpage', 'facebook', 'yahoo', 'instagram', 'google'], 'string', 'max' => 800],
            [['work_phone', 'fax'], 'string', 'max' => 25],
            [['note'], 'string', 'max' => 5000]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'website' => 'Website',
            'headline' => 'Headline',
            'industry' => 'Industry',
            'phone_number' => 'Phone Number',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'postal_code' => 'Postal Code',
            'num_of_employee' => 'Num Of Employee',
            'annual_revenue' => 'Annual Revenue',
            'facebook_fans' => 'Facebook Fans',
            'twitter_handle' => 'Twitter Handle',
            'twitter_followers' => 'Twitter Followers',
            'timezone' => 'Timezone',
            'description' => 'Description',
            'line_of_business' => 'Line Of Business',
            'general_email' => 'General Email',
            'country' => 'Country',
            'work_phone' => 'Work Phone',
            'fax' => 'Fax',
            'webpage' => 'Webpage',
            'facebook' => 'Facebook',
            'linkedin_company_page' => 'Linkedin Company Page',
            'yahoo' => 'Yahoo',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'google' => 'Google',
            'note' => 'Note',
            'belong_company_id' => 'Belongs to Company',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBelongCompany()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'belong_company_id'])->inverseOf('companies');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersBelongToThis()
    {
        return $this->hasMany(\app\models\User::className(), ['id' => 'belong_company_id'])->inverseOf('belongCompany');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenuesBelongToThis()
    {
        return $this->hasMany(\app\models\Venue::className(), ['id' => 'belong_company_id'])->inverseOf('belongCompany');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettlementsBelongToThis()
    {
        return $this->hasMany(\app\models\Settlement::className(), ['id' => 'belong_company_id'])->inverseOf('belongCompany');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(\app\models\Company::className(), ['belong_company_id' => 'id'])->inverseOf('belongCompany');
    }

	       
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMkRadios()
   {
       return $this->hasMany(\app\models\MkRadio::className(), ['company_id' => 'id'])->inverseOf('company');
   }
       
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMkTelevisions()
   {
       return $this->hasMany(\app\models\MkTelevision::className(), ['company_id' => 'id'])->inverseOf('company');
   }

   /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(\app\models\Offer::className(), ['ticketing_company_id' => 'id'])->inverseOf('agency')->inverseOf('coproPromoter')->inverseOf('ticketingCompany');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettlements()
    {
        return $this->hasMany(\app\models\Settlement::className(), ['first_party_id' => 'id'])->inverseOf('firstParty');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\User::className(), ['company_id' => 'id'])->inverseOf('company');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenues()
    {
        return $this->hasMany(\app\models\Venue::className(), ['company_id' => 'id'])->inverseOf('company')->inverseOf('organizer');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketVenues(){
        return $this->hasMany(\app\models\Venue::className(), ['primary_ticketing_company_id' => 'id'])->inverseOf('company')->inverseOf('primaryTicketingCompany');
    }
}
