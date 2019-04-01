<?php

namespace app\models\base;

use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "offer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $offer_type
 * @property integer $copro_promoter_id
 * @property integer $copro_venue_id
 * @property string $event_id
 * @property integer $show_number
 * @property integer $show_total_num
 * @property integer $agency_id
 * @property integer $agent_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $artist_id
 * @property integer $venue_id
 * @property string $show_date
 * @property integer $is_tbd_date
 * @property string $show_type
 * @property string $doors
 * @property string $showtime
 * @property string $notes
 * @property integer $l1_gross_ticket
 * @property integer $l1_kill
 * @property string $l1_price
 * @property integer $l2_gross_ticket
 * @property integer $l2_kill
 * @property string $l2_price
 * @property integer $l3_gross_ticket
 * @property integer $l3_kill
 * @property string $l3_price
 * @property integer $l4_gross_ticket
 * @property integer $l4_kill
 * @property string $l4_price
 * @property integer $l5_gross_ticket
 * @property integer $l5_kill
 * @property string $l5_price
 * @property string $on_sale_date
 * @property integer $is_on_sale_date_tbd
 * @property integer $ticketing_company_id
 * @property string $seating_plan
 * @property string $tax
 * @property string $tax_note
 * @property string $tax_per_ticket
 * @property string $facility_fee
 * @property string $facility_fee_note
 * @property string $artist_guarantee
 * @property string $artist_deposit
 * @property string $artist_offer_type
 * @property integer $is_artist_production_buyout
 * @property string $artist_split
 * @property string $promoter_profit
 * @property string $expense_application
 * @property string $sponsorship
 * @property string $radius_clause
 * @property string $radius_clause_metric
 * @property integer $pre_show_lockout
 * @property string $pre_show_lockout_unit
 * @property integer $post_show_lockout
 * @property string $post_show_lockout_unit
 * @property string $artist_deal_note
 * @property integer $support_artist_1_id
 * @property string $support_artist_1_total
 * @property integer $support_artist_2_id
 * @property string $support_artist_2_total
 * @property integer $support_artist_3_id
 * @property string $support_artist_3_total
 * @property string $general_expense
 * @property string $production_expense
 * @property string $housenut_total
 * @property string $housenut_expense
 * @property string $general_expense_note
 * @property string $variable_expense
 * @property string $merch_buyout_venue_sell
 * @property string $merch_buyout_artist_sell
 * @property string $merch_artist_split_venue_sell
 * @property string $merch_artist_split_artist_sell
 * @property string $merch_venue_split_venue_sell
 * @property string $merch_artist_split_media_venue_sell
 * @property string $merch_artist_split_media_artist_sell
 * @property string $merch_venue_split_media_venue_sell
 * @property string $merch_note
 * @property integer $artist_comp
 * @property string $artist_comp_note
 * @property integer $production_comp
 * @property string $production_comp_note
 * @property integer $promotional_comp
 * @property string $promotional_comp_note
 * @property integer $house_comp
 * @property string $house_comp_note
 * @property integer $kill
 * @property string $kill_note
 * @property string $comp_kill_note
 * @property string $ascap_0_2500
 * @property string $ascap_2501_5000
 * @property string $ascap_5001_10000
 * @property string $ascap_10001_25000
 * @property string $ascap_25001_x
 * @property string $bmi_0_2500
 * @property string $bmi_2501_3500
 * @property string $bmi_3501_5000
 * @property string $bmi_5001_10000
 * @property string $bmi_10001_x
 * @property integer $belong_company_id
 *
 * @property \app\models\Marketing $marketing
 * @property \app\models\User $user
 * @property \app\models\Company $agency
 * @property \app\models\User $agent
 * @property \app\models\User $artist
 * @property \app\models\Company $coproPromoter
 * @property \app\models\Venue $coproVenue
 * @property \app\models\User $supportArtist1
 * @property \app\models\User $supportArtist2
 * @property \app\models\User $supportArtist3
 * @property \app\models\Company $ticketingCompany
 * @property \app\models\Venue $venue
 * @property \app\models\Settlement[] $settlements
 * @property \app\models\Company $belongCompany
 */
class Offer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'marketing',
            'user',
            'agency',
            'agent',
            'artist',
            'coproPromoter',
            'coproVenue',
            'supportArtist1',
            'supportArtist2',
            'supportArtist3',
            'ticketingCompany',
            'venue',
            'belongCompany'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'copro_promoter_id', 'copro_venue_id', 'show_number', 'show_total_num', 'agency_id', 'agent_id', 'artist_id', 'venue_id', 'is_tbd_date', 'l1_gross_ticket',
                'l1_kill', 'l2_gross_ticket', 'l2_kill', 'l3_gross_ticket', 'l3_kill', 'l4_gross_ticket', 'l4_kill', 'l5_gross_ticket', 'l5_kill', 'is_on_sale_date_tbd',
                'ticketing_company_id', 'is_artist_production_buyout', 'pre_show_lockout', 'post_show_lockout', 'support_artist_1_id', 'support_artist_2_id', 'support_artist_3_id',
                'artist_comp', 'production_comp', 'promotional_comp', 'house_comp', 'kill', 'belong_company_id'], 'integer'],
            [['offer_type', 'status', 'show_type', 'artist_offer_type', 'expense_application', 'radius_clause_metric', 'pre_show_lockout_unit', 'post_show_lockout_unit'], 'string'],
            [['created_at', 'updated_at', 'show_date', 'doors', 'showtime', 'on_sale_date'], 'safe'],
            [['l1_price', 'l2_price', 'l3_price', 'l4_price', 'l5_price', 'tax', 'tax_per_ticket', 'facility_fee', 'artist_guarantee', 'artist_deposit', 'artist_split',
                'promoter_profit', 'radius_clause', 'support_artist_1_total', 'support_artist_2_total', 'support_artist_3_total', 'housenut_total', 'merch_buyout_venue_sell',
                'merch_buyout_artist_sell', 'merch_artist_split_venue_sell', 'merch_artist_split_artist_sell', 'merch_venue_split_venue_sell',
                'merch_artist_split_media_venue_sell', 'merch_artist_split_media_artist_sell', 'merch_venue_split_media_venue_sell',
                'ascap_0_2500', 'ascap_2501_5000', 'ascap_5001_10000', 'ascap_10001_25000', 'ascap_25001_x',
                'bmi_0_2500', 'bmi_2501_3500', 'bmi_3501_5000', 'bmi_5001_10000', 'bmi_10001_x'], 'number'],
            [['event_id'], 'string', 'max' => 45],
            [['notes'], 'string', 'max' => 2000],
            [['seating_plan'], 'string', 'max' => 80],
            [['tax_note', 'facility_fee_note', 'sponsorship'], 'string', 'max' => 255],
            [['artist_deal_note', 'housenut_expense', 'general_expense_note', 'merch_note'], 'string', 'max' => 3000],
            [['general_expense', 'production_expense', 'variable_expense'], 'string', 'max' => 8000],
            [['artist_comp_note', 'production_comp_note', 'promotional_comp_note', 'house_comp_note', 'kill_note', 'comp_kill_note'], 'string', 'max' => 800],
            [['event_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'offer_type' => 'Offer Type',
            'copro_promoter_id' => 'Copro Promoter ID',
            'copro_venue_id' => 'Copro Venue ID',
            'event_id' => 'Event ID',
            'show_number' => 'Show Number',
            'show_total_num' => 'Show Total Num',
            'agency_id' => 'Agency ID',
            'agent_id' => 'Agent ID',
            'status' => 'Status',
            'artist_id' => 'Artist ID',
            'venue_id' => 'Venue ID',
            'show_date' => 'Show Date',
            'is_tbd_date' => 'Is Tbd Date',
            'show_type' => 'Show Type',
            'doors' => 'Doors',
            'showtime' => 'Showtime',
            'notes' => 'Notes',
            'l1_gross_ticket' => 'L1 Gross Ticket',
            'l1_kill' => 'L1 Kill',
            'l1_price' => 'L1 Price',
            'l2_gross_ticket' => 'L2 Gross Ticket',
            'l2_kill' => 'L2 Kill',
            'l2_price' => 'L2 Price',
            'l3_gross_ticket' => 'L3 Gross Ticket',
            'l3_kill' => 'L3 Kill',
            'l3_price' => 'L3 Price',
            'l4_gross_ticket' => 'L4 Gross Ticket',
            'l4_kill' => 'L4 Kill',
            'l4_price' => 'L4 Price',
            'l5_gross_ticket' => 'L5 Gross Ticket',
            'l5_kill' => 'L5 Kill',
            'l5_price' => 'L5 Price',
            'on_sale_date' => 'On Sale Date',
            'is_on_sale_date_tbd' => 'Is On Sale Date Tbd',
            'ticketing_company_id' => 'Ticketing Company ID',
            'seating_plan' => 'Seating Plan',
            'tax' => 'Tax',
            'tax_note' => 'Tax Note',
            'tax_per_ticket' => 'Tax Per Ticket',
            'facility_fee' => 'Facility Fee',
            'facility_fee_note' => 'Facility Fee Note',
            'artist_guarantee' => 'Artist Guarantee',
            'artist_deposit' => 'Artist Deposit',
            'artist_offer_type' => 'Artist Offer Type',
            'is_artist_production_buyout' => 'Is Artist Production Buyout',
            'artist_split' => 'Artist Split',
            'promoter_profit' => 'Promoter Profit',
            'expense_application' => 'Expense Application',
            'sponsorship' => 'Sponsorship',
            'radius_clause' => 'Radius Clause',
            'radius_clause_metric' => 'Radius Clause Metric',
            'pre_show_lockout' => 'Pre Show Lockout',
            'pre_show_lockout_unit' => 'Pre Show Lockout Unit',
            'post_show_lockout' => 'Post Show Lockout',
            'post_show_lockout_unit' => 'Post Show Lockout Unit',
            'artist_deal_note' => 'Artist Deal Note',
            'support_artist_1_id' => 'Support Artist 1 ID',
            'support_artist_1_total' => 'Support Artist 1 Total',
            'support_artist_2_id' => 'Support Artist 2 ID',
            'support_artist_2_total' => 'Support Artist 2 Total',
            'support_artist_3_id' => 'Support Artist 3 ID',
            'support_artist_3_total' => 'Support Artist 3 Total',
            'general_expense' => 'General Expense',
            'production_expense' => 'Production Expense',
            'housenut_total' => 'Housenut Total',
            'housenut_expense' => 'Housenut Expense',
            'general_expense_note' => 'General Expense Note',
            'variable_expense' => 'Variable Expense',
            'merch_buyout_venue_sell' => 'Merch Buyout Venue Sell',
            'merch_buyout_artist_sell' => 'Merch Buyout Artist Sell',
            'merch_artist_split_venue_sell' => 'Merch Artist Split Venue Sell',
            'merch_artist_split_artist_sell' => 'Merch Artist Split Artist Sell',
            'merch_venue_split_venue_sell' => 'Merch Venue Split Venue Sell',
            'merch_artist_split_media_venue_sell' => 'Merch Artist Split Media Venue Sell',
            'merch_artist_split_media_artist_sell' => 'Merch Artist Split Media Artist Sell',
            'merch_venue_split_media_venue_sell' => 'Merch Venue Split Media Venue Sell',
            'merch_note' => 'Merch Note',
            'artist_comp' => 'Artist Comp',
            'artist_comp_note' => 'Artist Comp Note',
            'production_comp' => 'Production Comp',
            'production_comp_note' => 'Production Comp Note',
            'promotional_comp' => 'Promotional Comp',
            'promotional_comp_note' => 'Promotional Comp Note',
            'house_comp' => 'House Comp',
            'house_comp_note' => 'House Comp Note',
            'kill' => 'Kill',
            'kill_note' => 'Kill Note',
            'comp_kill_note' => 'Comp Kill Note',
            'ascap_0_2500' => 'Ascap 0 2500',
            'ascap_2501_5000' => 'Ascap 2501 5000',
            'ascap_5001_10000' => 'Ascap 5001 10000',
            'ascap_10001_25000' => 'Ascap 10001 25000',
            'ascap_25001_x' => 'Ascap 25001 X',
            'bmi_0_2500' => 'Bmi 0 2500',
            'bmi_2501_3500' => 'Bmi 2501 3500',
            'bmi_3501_5000' => 'Bmi 3501 5000',
            'bmi_5001_10000' => 'Bmi 5001 10000',
            'bmi_10001_x' => 'Bmi 10001 X',
            'belong_company_id' => 'Belong to Company',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketing()
    {
        return $this->hasOne(\app\models\Marketing::className(), ['offer_id' => 'id'])->inverseOf('offer');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgency()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'agency_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'agent_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'artist_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoproPromoter()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'copro_promoter_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoproVenue()
    {
        return $this->hasOne(\app\models\Venue::className(), ['id' => 'copro_venue_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportArtist1()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'support_artist_1_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportArtist2()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'support_artist_2_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportArtist3()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'support_artist_3_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketingCompany()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'ticketing_company_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenue()
    {
        return $this->hasOne(\app\models\Venue::className(), ['id' => 'venue_id'])->inverseOf('offers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getSettlements()
    {
        return $this->hasMany(\app\models\Settlement::className(), ['second_party_event_id' => 'event_id'])->inverseOf('firstPartyEvent')->inverseOf('secondPartyEvent');
    }*/

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBelongCompany()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'belong_company_id'])->inverseOf('offers');
    }
}
