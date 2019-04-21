<?php

namespace app\models;

use Yii;
use \app\models\base\Project as BaseProject;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id'], 'required'],
            [['user_id', '404page_id', 'thankspage_id'], 'integer'],
            [['type'], 'string'],
            [['name', 'url', 'logo', 'facebook_pixel_code', 'custom_robots'], 'string', 'max' => 800],
            [['country_code'], 'string', 'max' => 2],
            [['favicon', 'biz_contact_name', 'wechat_image'], 'string', 'max' => 255],
            [['does_enable_phone_display', 'does_enable_email_display', 'does_use_footer', 'does_use_credit_text', 'does_enable_custom_robots'], 'string', 'max' => 1],
            [['phone', 'sms', 'whatsapp', 'phone2', 'phone3'], 'string', 'max' => 18],
            [['email', 'email2', 'email3', 'facebook', 'youtube', 'instagram', 'linkedin', 'twitter', 'googleplus'], 'string', 'max' => 80],
            [['wechatid'], 'string', 'max' => 25],
            [['footer', 'credit_text', 'default_page_title', 'default_meta_description', 'default_meta_keywords', 'g_search_site_verification', 'g_global_site_tags', 'g_remarketing_tag'], 'string', 'max' => 2000]
        ]);
    }
	
}
