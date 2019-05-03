<?php

namespace app\models;

use app\models\base\Project as BaseProject;
use usv\yii2helper\PHPHelper;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    private const DEFAULT_THEME = 'flattheme';
    public function gotoFolder()
    {
        chdir('../web/sites');
        $norm_url = PHPHelper::dbNormalizeString($this->url);
        chdir($norm_url);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            //create default pages
            $page = new Page();
            //index
            $page->setAttributes(['project_id' => $this->id, 'name' => 'Home', 'type' => 'home']);
            $template = new Template(self::DEFAULT_THEME);
            $page->html = $template->getHtml('home');
            $page->save();
        }
    }
}
