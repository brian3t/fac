<?php

namespace app\models;

use app\models\base\Microsite as BaseMicrosite;

/**
 * This is the model class for table "microsite".
 */
class Microsite extends BaseMicrosite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['project_id', 'listing_id'], 'required'],
            [['project_id', 'listing_id'], 'integer'],
            [['is_using_project_domain'], 'string', 'max' => 1],
            [['subdomain'], 'string', 'max' => 20],
            [['domain'], 'string', 'max' => 100]
        ]);
    }
	
}
