<?php

namespace app\models;

use app\models\base\Project as BaseProject;
use usv\yii2helper\PHPHelper;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    public function gotoFolder(){
        chdir('../web/sites');
        $norm_url = PHPHelper::dbNormalizeString($this->url);
        chdir($norm_url);
    }
}
