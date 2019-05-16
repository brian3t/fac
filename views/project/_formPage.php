<div class="form-group" id="add-page">
<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
/** @var $model \app\models\Page */
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Page',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        /*'microsite_id' => [
            'label' => 'Microsite',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Microsite::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Microsite'],
            ],
            'columnOptions' => ['width' => '200px']
        ],*/
        'type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
            'items' => [ 'index' => 'Index', 'about' => 'About', 'content' => 'Content', 'blank' => 'Blank', ],
            'options' => [
                'columnOptions' => ['width' => '185px'],
                'options' => ['placeholder' => 'Choose Type'],
            ]
        ],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'html' => ['type' => 'raw', 'value' => function ($model) {
            $id = $model['id'] ?? null;
            if (is_int($id) && $id > 0) {
                return Html::a('WYSIWYG edit', "/page/update?id=$id");
            } else {
                return '';
            }
        }],
        'preview' => ['type' => 'raw', 'value' => function($model){
            /** @var $model \app\models\Page */
            $project = \app\models\Project::findOne($model['project_id']);
            /** @var \app\models\Project $project */
            return Html::a(ucwords($model['type']), $project->full_url. "/". $model['type'] . '.html');
        }],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowPage(' . $key . '); return false;', 'id' => 'page-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Page', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPage()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

