<?php

namespace app\models;

use app\models\base\UserEvent as BaseUserEvent;

/**
 * This is the model class for table "user_event".
 */
class UserEvent extends BaseUserEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'event_id'], 'integer'],
            [['is_going'], 'string', 'max' => 4],
            [['comment'], 'string', 'max' => 800]
        ]);
    }
	
}
