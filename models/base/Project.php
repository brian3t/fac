<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "project".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $use_own_domain
 * @property string $domain
 * @property string $url
 * @property string $full_url
 * @property string $country_code
 * @property string $logo
 * @property string $favicon
 * @property string $type
 * @property string $biz_contact_name
 * @property integer $does_enable_phone_display
 * @property integer $does_enable_email_display
 * @property string $phone
 * @property string $email
 * @property string $sms
 * @property string $whatsapp
 * @property string $wechatid
 * @property string $wechat_image
 * @property string $phone2
 * @property string $email2
 * @property string $phone3
 * @property string $email3
 * @property string $footer
 * @property integer $does_use_footer
 * @property string $credit_text
 * @property integer $does_use_credit_text
 * @property string $default_page_title
 * @property string $default_meta_description
 * @property string $default_meta_keywords
 * @property integer $404page_id
 * @property integer $thankspage_id
 * @property string $g_search_site_verification
 * @property string $g_global_site_tags
 * @property string $g_remarketing_tag
 * @property string $facebook_pixel_code
 * @property integer $does_enable_custom_robots
 * @property string $custom_robots
 * @property string $facebook
 * @property string $youtube
 * @property string $instagram
 * @property string $linkedin
 * @property string $twitter
 * @property string $googleplus
 *
 * @property \app\models\Gallery $gallery
 * @property \app\models\Microsite[] $microsites
 * @property \app\models\Page[] $pages
 * @property \app\models\User $user
 */
class Project extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'gallery',
            'microsites',
            'pages',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', '404page_id', 'thankspage_id'], 'integer'],
            [['type'], 'string'],
            [['name', 'url', 'full_url'], 'string', 'max' => 400],
            [['use_own_domain', 'does_enable_phone_display', 'does_enable_email_display', 'does_use_footer', 'does_use_credit_text', 'does_enable_custom_robots'], 'string', 'max' => 1],
            [['domain', 'email', 'email2', 'email3', 'facebook', 'youtube', 'instagram', 'linkedin', 'twitter', 'googleplus'], 'string', 'max' => 80],
            [['country_code'], 'string', 'max' => 2],
            [['favicon', 'biz_contact_name', 'wechat_image'], 'string', 'max' => 255],
            [['phone', 'sms', 'whatsapp', 'phone2', 'phone3'], 'string', 'max' => 18],
            [['wechatid'], 'string', 'max' => 25],
            [['footer', 'credit_text', 'default_page_title', 'default_meta_description', 'default_meta_keywords', 'g_search_site_verification', 'g_global_site_tags', 'g_remarketing_tag'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Agent',
            'name' => 'Name',
            'use_own_domain' => 'Use Own Domain',
            'domain' => 'Domain',
            'url' => 'Url',
            'full_url' => 'Full Url',
            'country_code' => 'Country',
            'logo' => 'Logo',
            'favicon' => 'Favicon',
            'type' => 'Type',
            'biz_contact_name' => 'Biz Contact Name',
            'does_enable_phone_display' => 'Show Phone Number',
            'does_enable_email_display' => 'Show Email',
            'phone' => 'Phone',
            'email' => 'Email',
            'sms' => 'Sms',
            'whatsapp' => 'Whatsapp',
            'wechatid' => 'Wechatid',
            'wechat_image' => 'Wechat Image',
            'phone2' => 'Phone2',
            'email2' => 'Email2',
            'phone3' => 'Phone3',
            'email3' => 'Email3',
            'footer' => 'Footer',
            'does_use_footer' => 'Use Footer',
            'credit_text' => 'Credit Text',
            'does_use_credit_text' => 'Use Credit Text',
            'default_page_title' => 'Default Page Title',
            'default_meta_description' => 'Default Meta Description',
            'default_meta_keywords' => 'Default Meta Keywords',
            '404page_id' => '404 Page',
            'thankspage_id' => 'Thanks page',
            'g_search_site_verification' => 'Google Search Site Verification',
            'g_global_site_tags' => 'Google Global Site Tags',
            'g_remarketing_tag' => 'Google Remarketing Tag',
            'facebook_pixel_code' => 'Facebook Pixel Code',
            'does_enable_custom_robots' => 'Enable Custom Robots',
            'custom_robots' => 'Custom Robots',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'twitter' => 'Twitter',
            'googleplus' => 'Google Plus',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(\app\models\Gallery::className(), ['project_id' => 'id'])->inverseOf('project');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMicrosites()
    {
        return $this->hasMany(\app\models\Microsite::className(), ['project_id' => 'id'])->inverseOf('project');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(\app\models\Page::className(), ['project_id' => 'id'])->inverseOf('project');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id'])->inverseOf('projects');
    }
    }
