<?php

namespace app\models\base;

/**
 * This is the base model class for table "microsite".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $project_id
 * @property integer $listing_id
 * @property integer $is_using_project_domain
 * @property string $subdomain
 * @property string $domain
 *
 * @property \app\models\Gallery[] $galleries
 * @property \app\models\Listing $listing
 * @property \app\models\Project $project
 * @property \app\models\Page[] $pages
 */
class Microsite extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'galleries',
            'listing',
            'project',
            'pages'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['project_id', 'listing_id'], 'required'],
            [['project_id', 'listing_id'], 'integer'],
            [['is_using_project_domain'], 'string', 'max' => 1],
            [['subdomain'], 'string', 'max' => 20],
            [['domain'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'microsite';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'listing_id' => 'Listing ID',
            'is_using_project_domain' => 'Is Using Project Domain',
            'subdomain' => 'Subdomain',
            'domain' => 'Domain',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(\app\models\Gallery::className(), ['microsite_id' => 'id'])->inverseOf('microsite');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListing()
    {
        return $this->hasOne(\app\models\Listing::className(), ['id' => 'listing_id'])->inverseOf('microsites');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'project_id'])->inverseOf('microsites');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(\app\models\Page::className(), ['microsite_id' => 'id'])->inverseOf('microsite');
    }
    }
