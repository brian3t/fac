<?php

namespace app\models\base;

/**
 * This is the base model class for table "microsite_menu".
 *
 * @property integer $id
 * @property integer $page_id
 * @property string $name
 * @property integer $order
 *
 * @property \app\models\Page $page
 */
class MicrositeMenu extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'page'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id'], 'required'],
            [['page_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['order'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'microsite_menu';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'name' => 'Name',
            'order' => 'Order',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(\app\models\Page::className(), ['id' => 'page_id'])->inverseOf('micrositeMenus');
    }
    }
