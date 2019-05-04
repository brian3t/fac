<?php

namespace app\models;

use app\models\base\Project as BaseProject;
use usv\yii2helper\models\ModelB3tTrait;
use usv\yii2helper\PHPHelper;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    use ModelB3tTrait;
    public static $SITES_DIR = '/var/www/fac/web/sites/';
    public function gotoFolder()
    {
        chdir('../web/sites');
        $norm_url = PHPHelper::dbNormalizeString($this->url);
        chdir($norm_url);
    }

    public function afterSaveAll($insert)
    {
        if ($insert) {
            //create default pages
            $page = new Page();
            //index
            $page->setAttributes(['project_id' => $this->id, 'name' => 'Home', 'type' => 'home']);
            $template = new Template();
            $page->html = $template->getHtml('home');
            $page->saveAndLogError();
        }
    }
}
