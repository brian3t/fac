<?php

namespace app\models\base;

/**
 * This is the base model class for table "page".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $microsite_id
 * @property string $name
 *
 * @property \app\models\MicrositeMenu[] $micrositeMenus
 * @property \app\models\Microsite $microsite
 * @property \app\models\Project $project
 * @property \app\models\ProjectMenu[] $projectMenus
 */
class Page extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'micrositeMenus',
            'microsite',
            'project',
            'projectMenus'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'microsite_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'microsite_id' => 'Microsite ID',
            'name' => 'Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMicrositeMenus()
    {
        return $this->hasMany(\app\models\MicrositeMenu::className(), ['page_id' => 'id'])->inverseOf('page');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMicrosite()
    {
        return $this->hasOne(\app\models\Microsite::className(), ['id' => 'microsite_id'])->inverseOf('pages');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'project_id'])->inverseOf('pages');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectMenus()
    {
        return $this->hasMany(\app\models\ProjectMenu::className(), ['page_id' => 'id'])->inverseOf('page');
    }
    }
