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
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'venue_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '' => '', 'Amphitheater' => 'Amphitheater', 'Arena' => 'Arena', 'Bandshell' => 'Bandshell', 'Club' => 'Club', 'College' => 'College', 'Concert Hall' => 'Concert Hall', 'Operahouse' => 'Operahouse', 'Other' => 'Other', 'Private' => 'Private', 'Stadium' => 'Stadium', 'Theater' => 'Theater', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Venue Type'],
                    ]
        ],
        'previous_name' => ['type' => TabularForm::INPUT_TEXT],
        'note' => ['type' => TabularForm::INPUT_TEXT],
        'ticket_rebate' => ['type' => TabularForm::INPUT_TEXT],
        'other_deal' => ['type' => TabularForm::INPUT_TEXT],
        'address1' => ['type' => TabularForm::INPUT_TEXT],
        'address2' => ['type' => TabularForm::INPUT_TEXT],
        'city' => ['type' => TabularForm::INPUT_TEXT],
        'state' => ['type' => TabularForm::INPUT_TEXT],
        'zipcode' => ['type' => TabularForm::INPUT_TEXT],
        'country' => ['type' => TabularForm::INPUT_TEXT],
        'timezone' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '' => '', 'ACDT Australian Central Daylight Savings Time' => 'ACDT Australian Central Daylight Savings Time', 'ACST Australian Central Standard Time' => 'ACST Australian Central Standard Time', 'ACT Acre Time' => 'ACT Acre Time', 'ACT ASEAN Common Time' => 'ACT ASEAN Common Time', 'ADT Atlantic Daylight Time' => 'ADT Atlantic Daylight Time', 'AEDT Australian Eastern Daylight Savings Time' => 'AEDT Australian Eastern Daylight Savings Time', 'AEST Australian Eastern Standard Time' => 'AEST Australian Eastern Standard Time', 'AFT Afghanistan Time' => 'AFT Afghanistan Time', 'AKDT Alaska Daylight Time' => 'AKDT Alaska Daylight Time', 'AKST Alaska Standard Time' => 'AKST Alaska Standard Time', 'AMST Amazon Summer Time (Brazil' => 'AMST Amazon Summer Time (Brazil', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Timezone'],
                    ]
        ],
        'owner' => ['type' => TabularForm::INPUT_TEXT],
        'company_id' => [
            'label' => 'Company',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'general_info_email' => ['type' => TabularForm::INPUT_TEXT],
        'main_office_phone' => ['type' => TabularForm::INPUT_TEXT],
        'box_office_phone' => ['type' => TabularForm::INPUT_TEXT],
        'fax_phone' => ['type' => TabularForm::INPUT_TEXT],
        'other_phone' => ['type' => TabularForm::INPUT_TEXT],
        'other_seating_capacity' => ['type' => TabularForm::INPUT_TEXT],
        'end_stage_seating_capacity' => ['type' => TabularForm::INPUT_TEXT],
        'full_stage_seating_capacity' => ['type' => TabularForm::INPUT_TEXT],
        'half_stage_seating_capacity' => ['type' => TabularForm::INPUT_TEXT],
        'in_the_round_seating_capacity' => ['type' => TabularForm::INPUT_TEXT],
        'other_seating_capacity_name' => ['type' => TabularForm::INPUT_TEXT],
        'other_seating_capacity_value' => ['type' => TabularForm::INPUT_TEXT],
        'webpage' => ['type' => TabularForm::INPUT_TEXT],
        'facebook' => ['type' => TabularForm::INPUT_TEXT],
        'yahoo' => ['type' => TabularForm::INPUT_TEXT],
        'linkedin' => ['type' => TabularForm::INPUT_TEXT],
        'twitter' => ['type' => TabularForm::INPUT_TEXT],
        'instagram' => ['type' => TabularForm::INPUT_TEXT],
        'google' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowVenue(' . $key . '); return false;', 'id' => 'venue-del-btn']);
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

