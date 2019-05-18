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

    public static $SITES_FOLDER = '/var/www/fac/web/sites/';
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

        $search = '/<link rel="stylesheet" href="(?!http)/';
        $html = preg_replace($search, '<link rel="stylesheet" href="' . WEBROOT . 'sites/' . $this->project->url . '/', $html);

        $search = '/img(.+)src="(?!http)/';
        $html = preg_replace($search, 'img${1}src="' . WEBROOT . 'sites/' . $this->project->url . '/', $html);

        $search = '/style="background-image: url\(\'(?!http)/';
        $html = preg_replace($search, 'style="background-image: url(\'' . WEBROOT . 'sites/' . $this->project->url . '/', $html);
//        $html = preg_replace($search, 'style="background-image: url(abcde', $html);


        $this->html = $html;

        //now output this back to html raw file
        $my_output_file_path = self::$SITES_FOLDER . $this->project->url. '/' . $this->type . '.html';
        file_put_contents($my_output_file_path, $this->html);

        return parent::beforeSave($insert);
    }

    public function getPreviewUrl(){
        return WEBROOT . 'sites/' . $this->project->url . '/' . $this->type. '.html';
    }
}
