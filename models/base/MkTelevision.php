<?php

namespace app\models\base;

/**
 * This is the base model class for table "mk_television".
 *
 * @property integer $id
 * @property integer $marketing_id
 * @property integer $company_id
 * @property string $format
 * @property string $contact
 * @property string $phone_email
 * @property string $impressions
 * @property integer $promo_tickets
 * @property string $promo_value
 * @property string $promo_run_from
 * @property string $promo_run_to
 * @property string $paid_run_from
 * @property string $paid_run_to
 * @property integer $qty
 * @property string $dg_code
 * @property string $gross
 * @property string $net
 *
 * @property \app\models\Marketing $marketing
 * @property \app\models\Company $company
 */
class MkTelevision extends \yii\db\ActiveRecord
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
            'company'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marketing_id', 'company_id', 'gross'], 'required'],
            [['marketing_id', 'company_id', 'promo_tickets', 'qty'], 'integer'],
            [['impressions', 'promo_value', 'gross', 'net'], 'number'],
            [['promo_run_from', 'promo_run_to', 'paid_run_from', 'paid_run_to'], 'safe'],
            [['format', 'phone_email'], 'string', 'max' => 800],
            [['contact', 'dg_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mk_television';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_id' => 'Marketing ID',
            'company_id' => 'Company ID',
            'format' => 'Format',
            'contact' => 'Contact',
            'phone_email' => 'Phone Email',
            'impressions' => 'Impressions',
            'promo_tickets' => 'Promo Tickets',
            'promo_value' => 'Promo Value',
            'promo_run_from' => 'Promo Run From',
            'promo_run_to' => 'Promo Run To',
            'paid_run_from' => 'Paid Run From',
            'paid_run_to' => 'Paid Run To',
            'qty' => 'Qty',
            'dg_code' => 'Dg Code',
            'gross' => 'Gross',
            'net' => 'Net',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarketing()
    {
        return $this->hasOne(\app\models\Marketing::className(), ['id' => 'marketing_id'])->inverseOf('mkTelevisions');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'company_id'])->inverseOf('mkTelevisions');
    }
    }
