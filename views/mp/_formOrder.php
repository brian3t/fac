<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Order',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'channel_refnum' => ['type' => TabularForm::INPUT_TEXT],
        'retailops_order_id' => ['type' => TabularForm::INPUT_TEXT],
        'last_mp_updated' => ['type' => TabularForm::INPUT_TEXT],
        'last_rop_pull' => ['type' => TabularForm::INPUT_TEXT],
        'force_rop_resend' => ['type' => TabularForm::INPUT_TEXT],
        'count_rop_pull' => ['type' => TabularForm::INPUT_TEXT],
        'channel_date_created' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
            'options' => [
                'options' => ['placeholder' => 'Choose Channel Date Created'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'hh:ii:ss dd-M-yyyy'
                ]
            ]
        ],
        'shipping_amt' => ['type' => TabularForm::INPUT_TEXT],
        'tax_amt' => ['type' => TabularForm::INPUT_TEXT],
        'first_name' => ['type' => TabularForm::INPUT_TEXT],
        'last_name' => ['type' => TabularForm::INPUT_TEXT],
        'company' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'address1' => ['type' => TabularForm::INPUT_TEXT],
        'address2' => ['type' => TabularForm::INPUT_TEXT],
        'city' => ['type' => TabularForm::INPUT_TEXT],
        'state_match' => ['type' => TabularForm::INPUT_TEXT],
        'country_match' => ['type' => TabularForm::INPUT_TEXT],
        'postal_code' => ['type' => TabularForm::INPUT_TEXT],
        'gift_message' => ['type' => TabularForm::INPUT_TEXT],
        'phone' => ['type' => TabularForm::INPUT_TEXT],
        'ship_first_name' => ['type' => TabularForm::INPUT_TEXT],
        'ship_last_name' => ['type' => TabularForm::INPUT_TEXT],
        'ship_company' => ['type' => TabularForm::INPUT_TEXT],
        'ship_address1' => ['type' => TabularForm::INPUT_TEXT],
        'ship_address2' => ['type' => TabularForm::INPUT_TEXT],
        'ship_city' => ['type' => TabularForm::INPUT_TEXT],
        'ship_state_match' => ['type' => TabularForm::INPUT_TEXT],
        'ship_country_match' => ['type' => TabularForm::INPUT_TEXT],
        'ship_postal_code' => ['type' => TabularForm::INPUT_TEXT],
        'ship_phone' => ['type' => TabularForm::INPUT_TEXT],
        'pay_type' => ['type' => TabularForm::INPUT_TEXT],
        'pay_transaction_id' => ['type' => TabularForm::INPUT_TEXT],
        'comments' => ['type' => TabularForm::INPUT_TEXTAREA],
        'product_total' => ['type' => TabularForm::INPUT_TEXT],
        'customer_id' => [
            'label' => 'Customer',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Customer::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Customer'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'discount_amt' => ['type' => TabularForm::INPUT_TEXT],
        'grand_total' => ['type' => TabularForm::INPUT_TEXT],
        'ship_service_code' => ['type' => TabularForm::INPUT_TEXT],
        'ip_address' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_TEXT],
        'attributes' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowOrder(' . $key . '); return false;', 'id' => 'order-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Order',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowOrder()']),
        ]
    ]
]);
Pjax::end();
?>
