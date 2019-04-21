<?php

namespace app\models\base;

/**
 * This is the base model class for table "gallery".
 *
 * @property integer $id
 * @property string $name
 * @property string $file_path
 * @property integer $microsite_id
 * @property integer $project_id
 *
 * @property \app\models\Microsite $microsite
 * @property \app\models\Project $project
 */
class Gallery extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'microsite',
            'project'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_path'], 'required'],
            [['microsite_id', 'project_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['file_path'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file_path' => 'File Path',
            'microsite_id' => 'Microsite ID',
            'project_id' => 'Project ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMicrosite()
    {
        return $this->hasOne(\app\models\Microsite::className(), ['id' => 'microsite_id'])->inverseOf('gallery');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'project_id'])->inverseOf('gallery');
    }
    }
