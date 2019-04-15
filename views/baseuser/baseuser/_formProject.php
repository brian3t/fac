<div class="form-group" id="add-project">
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
    'formName' => 'Project',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'url' => ['type' => TabularForm::INPUT_TEXT],
        'country_code' => ['type' => TabularForm::INPUT_TEXT],
        'logo' => ['type' => TabularForm::INPUT_TEXT],
        'favicon' => ['type' => TabularForm::INPUT_TEXT],
        'type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'normal' => 'Normal', 'template' => 'Template', 'cloned' => 'Cloned', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Type'],
                    ]
        ],
        'biz_contact_name' => ['type' => TabularForm::INPUT_TEXT],
        'does_enable_phone_display' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'does_enable_email_display' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'phone' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'sms' => ['type' => TabularForm::INPUT_TEXT],
        'whatsapp' => ['type' => TabularForm::INPUT_TEXT],
        'wechatid' => ['type' => TabularForm::INPUT_TEXT],
        'wechat_image' => ['type' => TabularForm::INPUT_TEXT],
        'phone2' => ['type' => TabularForm::INPUT_TEXT],
        'email2' => ['type' => TabularForm::INPUT_TEXT],
        'phone3' => ['type' => TabularForm::INPUT_TEXT],
        'email3' => ['type' => TabularForm::INPUT_TEXT],
        'footer' => ['type' => TabularForm::INPUT_TEXT],
        'does_use_footer' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'credit_text' => ['type' => TabularForm::INPUT_TEXT],
        'does_use_credit_text' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'default_page_title' => ['type' => TabularForm::INPUT_TEXT],
        'default_meta_description' => ['type' => TabularForm::INPUT_TEXT],
        'default_meta_keywords' => ['type' => TabularForm::INPUT_TEXT],
        '404page_id' => ['type' => TabularForm::INPUT_TEXT],
        'thankspage_id' => ['type' => TabularForm::INPUT_TEXT],
        'g_search_site_verification' => ['type' => TabularForm::INPUT_TEXT],
        'g_global_site_tags' => ['type' => TabularForm::INPUT_TEXT],
        'g_remarketing_tag' => ['type' => TabularForm::INPUT_TEXT],
        'facebook_pixel_code' => ['type' => TabularForm::INPUT_TEXT],
        'does_enable_custom_robots' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'custom_robots' => ['type' => TabularForm::INPUT_TEXT],
        'facebook' => ['type' => TabularForm::INPUT_TEXT],
        'youtube' => ['type' => TabularForm::INPUT_TEXT],
        'instagram' => ['type' => TabularForm::INPUT_TEXT],
        'linkedin' => ['type' => TabularForm::INPUT_TEXT],
        'twitter' => ['type' => TabularForm::INPUT_TEXT],
        'googleplus' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowProject(' . $key . '); return false;', 'id' => 'project-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Project', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowProject()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

