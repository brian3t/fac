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

    public function beforeSave($insert)
    {
        $new_url = PHPHelper::dbNormalizeString($this->url);
        $this->full_url = WEBROOT . "sites/" . $new_url;
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $new_url = PHPHelper::dbNormalizeString($this->url);
        //rename folder here
        if ($insert || ! isset($changedAttributes['url'])) {
            return true;
        }
        $old_url = PHPHelper::dbNormalizeString($changedAttributes['url']);
        chdir('../web/sites');
        if (file_exists($old_url)) {
            try {
                rename($old_url, $new_url);
                $this->full_url = WEBROOT . "sites/" . $new_url;
                $this->save();
            } catch (\Exception $exception) {
                \Yii::error($exception->getMessage());
            }
        }
        return true;
    }

    public function afterSaveAll($insert)
    {
        if ($insert) {
            //create default pages
            $page = new Page();
            //index
            $page->setAttributes(['project_id' => $this->id, 'name' => 'Home', 'type' => 'index']);
            $template = new Template();
            $page->html = $template->getHtml('index');
            $page->saveAndLogError();
        }
    }
}
