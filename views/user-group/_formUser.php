<div class="form-group" id="add-user">
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
    'formName' => 'User',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'username' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'password_hash' => ['type' => TabularForm::INPUT_TEXT],
        'auth_key' => ['type' => TabularForm::INPUT_TEXT],
        'confirmed_at' => ['type' => TabularForm::INPUT_TEXT],
        'unconfirmed_email' => ['type' => TabularForm::INPUT_TEXT],
        'blocked_at' => ['type' => TabularForm::INPUT_TEXT],
        'registration_ip' => ['type' => TabularForm::INPUT_TEXT],
        'flags' => ['type' => TabularForm::INPUT_TEXT],
        'first_name' => ['type' => TabularForm::INPUT_TEXT],
        'last_name' => ['type' => TabularForm::INPUT_TEXT],
        'note' => ['type' => TabularForm::INPUT_TEXT],
        'phone_number_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Home' => 'Home', 'Business' => 'Business', 'Cell' => 'Cell', 'Fax' => 'Fax', 'Other' => 'Other', '' => '', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Phone Number Type'],
                    ]
        ],
        'phone_number' => ['type' => TabularForm::INPUT_TEXT],
        'birthdate' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Birthdate',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'birth_month' => ['type' => TabularForm::INPUT_TEXT],
        'birth_year' => ['type' => TabularForm::INPUT_TEXT],
        'website_url' => ['type' => TabularForm::INPUT_TEXT],
        'twitter_id' => ['type' => TabularForm::INPUT_TEXT],
        'facebook_id' => ['type' => TabularForm::INPUT_TEXT],
        'instagram_id' => ['type' => TabularForm::INPUT_TEXT],
        'google_id' => ['type' => TabularForm::INPUT_TEXT],
        'address1' => ['type' => TabularForm::INPUT_TEXT],
        'address2' => ['type' => TabularForm::INPUT_TEXT],
        'city' => ['type' => TabularForm::INPUT_TEXT],
        'state' => ['type' => TabularForm::INPUT_TEXT],
        'zipcode' => ['type' => TabularForm::INPUT_TEXT],
        'country' => ['type' => TabularForm::INPUT_TEXT],
        'last_login_at' => ['type' => TabularForm::INPUT_TEXT],
        'role' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowUser(' . $key . '); return false;', 'id' => 'user-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add User', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUser()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

