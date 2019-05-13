<?php

namespace app\models;

use app\models\base\Page as BasePage;
use usv\yii2helper\models\ModelB3tTrait;

/**
 * This is the model class for table "page".
 */
class Page extends BasePage
{
    use ModelB3tTrait;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'microsite_id'], 'integer'],
            [['type', 'html'], 'string'],
            [['name'], 'string', 'max' => 255]
        ]);
    }

    /**
     * Before saving a page, we rewrite the url so that it points to the full_url of the Project
     * e.g.
     * <link rel="stylesheet" href="assets/a.css">
     * will become:
     * <link rel="stylesheet" href="https://website.com/fullurl/assets/a.css">
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $html = $this->html;
        $search = '/<link rel="stylesheet" href=([a-zA-Z\/])"/i';//root dir or current dir
        preg_match_all('/link rel/i', $html, $out);
        $this->html = preg_replace($search, '<link rel="stylesheet" href=aaaa', $html);

        return parent::beforeSave($insert);
    }
}
