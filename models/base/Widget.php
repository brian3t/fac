<?php

namespace app\models\base;

/**
 * This is the base model class for table "widget".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $content
 * @property string $shortcode
 */
class Widget extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            ''
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['name', 'shortcode'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 8000]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'name' => 'Name',
            'content' => 'Content',
            'shortcode' => 'Shortcode',
        ];
    }
}
