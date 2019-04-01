<div class="form-group" id="add-band">
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
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Band',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'logo' => ['type' => TabularForm::INPUT_TEXT],
        'lno_score' => ['type' => TabularForm::INPUT_TEXT],
        'type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'covers' => 'Covers', 'originals' => 'Originals', 'covers & originals' => 'Covers & originals', 'unknown' => 'Unknown', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Type'],
                    ]
        ],
        'similar_to' => ['type' => TabularForm::INPUT_TEXT],
        'hometown_city' => ['type' => TabularForm::INPUT_TEXT],
        'hometown_state' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        'website' => ['type' => TabularForm::INPUT_TEXT],
        'facebook' => ['type' => TabularForm::INPUT_TEXT],
        'twitter' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowBand(' . $key . '); return false;', 'id' => 'band-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Band', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowBand()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

