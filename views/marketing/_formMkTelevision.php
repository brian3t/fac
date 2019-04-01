<div class="form-group" id="add-mk-television">
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
    'formName' => 'MkTelevision',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'company_id' => [
            'label' => 'Paid By Company',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'format' => ['type' => TabularForm::INPUT_TEXT],
        'contact' => ['type' => TabularForm::INPUT_TEXT],
        'phone_email' => ['type' => TabularForm::INPUT_TEXT],
        'impressions' => ['type' => TabularForm::INPUT_TEXT],
        'promo_tickets' => ['type' => TabularForm::INPUT_TEXT],
        'promo_value' => ['type' => TabularForm::INPUT_TEXT],
        'promo_run_from' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Promo Run From',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'promo_run_to' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Promo Run To',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'paid_run_from' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Paid Run From',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'paid_run_to' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Paid Run To',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'qty' => ['type' => TabularForm::INPUT_TEXT],
        'dg_code' => ['type' => TabularForm::INPUT_TEXT],
        'gross' => ['type' => TabularForm::INPUT_TEXT],
        'net' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowMkTelevision(' . $key . '); return false;', 'id' => 'mk-television-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Mk Television', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowMkTelevision()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

