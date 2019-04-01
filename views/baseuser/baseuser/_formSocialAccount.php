<div class="form-group" id="add-social-account">
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
    'formName' => 'SocialAccount',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'provider' => ['type' => TabularForm::INPUT_TEXT],
        'client_id' => ['type' => TabularForm::INPUT_TEXT],
        'data' => ['type' => TabularForm::INPUT_TEXTAREA],
        'code' => ['type' => TabularForm::INPUT_TEXT],
        'created_at' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'username' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSocialAccount(' . $key . '); return false;', 'id' => 'social-account-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Social Account', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSocialAccount()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

