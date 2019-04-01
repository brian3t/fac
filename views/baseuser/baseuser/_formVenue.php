<div class="form-group" id="add-venue">
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
    'formName' => 'Venue',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'address1' => ['type' => TabularForm::INPUT_TEXT],
        'address2' => ['type' => TabularForm::INPUT_TEXT],
        'city' => ['type' => TabularForm::INPUT_TEXT],
        'state' => ['type' => TabularForm::INPUT_TEXT],
        'zip' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXT],
        'phone' => ['type' => TabularForm::INPUT_TEXT],
        'cost' => ['type' => TabularForm::INPUT_TEXT],
        'website' => ['type' => TabularForm::INPUT_TEXT],
        'twitter' => ['type' => TabularForm::INPUT_TEXT],
        'facebook' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowVenue(' . $key . '); return false;', 'id' => 'venue-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Venue', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowVenue()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

