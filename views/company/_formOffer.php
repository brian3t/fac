<div class="form-group" id="add-offer">
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
    'formName' => 'Offer',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'user_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'offer_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Icon' => 'Icon', 'Co-Pro Promoter' => 'Co-Pro Promoter', 'Co-Pro Venue' => 'Co-Pro Venue', '3rd Party' => '3rd Party', '' => '', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Offer Type'],
                    ]
        ],
        'copro_promoter_id' => [
            'label' => 'Company',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'copro_venue_id' => [
            'label' => 'Venue',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Venue'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'event_id' => ['type' => TabularForm::INPUT_TEXT],
        'show_number' => ['type' => TabularForm::INPUT_TEXT],
        'show_total_num' => ['type' => TabularForm::INPUT_TEXT],
        'agency_id' => [
            'label' => 'Company',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'agent_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'New' => 'New', 'Submitted' => 'Submitted', 'Pending' => 'Pending', 'Reviewed' => 'Reviewed', 'Declined' => 'Declined', 'Confirmed' => 'Confirmed', 'Revised' => 'Revised', 'Signed' => 'Signed', 'Unsubmitted' => 'Unsubmitted', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status'],
                    ]
        ],
        'artist_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'venue_id' => [
            'label' => 'Venue',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Venue'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'show_date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Show Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'is_tbd_date' => ['type' => TabularForm::INPUT_TEXT],
        'show_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Private' => 'Private', 'Public' => 'Public', 'College' => 'College', 'College - Private' => 'College - Private', 'Casino' => 'Casino', 'Fair' => 'Fair', 'Festival' => 'Festival', '' => '', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Show Type'],
                    ]
        ],
        'doors' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Doors',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'showtime' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Showtime',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'notes' => ['type' => TabularForm::INPUT_TEXT],
        'l1_gross_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'l1_kill' => ['type' => TabularForm::INPUT_TEXT],
        'l1_price' => ['type' => TabularForm::INPUT_TEXT],
        'l2_gross_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'l2_kill' => ['type' => TabularForm::INPUT_TEXT],
        'l2_price' => ['type' => TabularForm::INPUT_TEXT],
        'l3_gross_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'l3_kill' => ['type' => TabularForm::INPUT_TEXT],
        'l3_price' => ['type' => TabularForm::INPUT_TEXT],
        'l4_gross_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'l4_kill' => ['type' => TabularForm::INPUT_TEXT],
        'l4_price' => ['type' => TabularForm::INPUT_TEXT],
        'l5_gross_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'l5_kill' => ['type' => TabularForm::INPUT_TEXT],
        'l5_price' => ['type' => TabularForm::INPUT_TEXT],
        'on_sale_date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose On Sale Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'is_on_sale_date_tbd' => ['type' => TabularForm::INPUT_TEXT],
        'seating_plan' => ['type' => TabularForm::INPUT_TEXT],
        'tax' => ['type' => TabularForm::INPUT_TEXT],
        'tax_note' => ['type' => TabularForm::INPUT_TEXT],
        'tax_per_ticket' => ['type' => TabularForm::INPUT_TEXT],
        'facility_fee' => ['type' => TabularForm::INPUT_TEXT],
        'facility_fee_note' => ['type' => TabularForm::INPUT_TEXT],
        'artist_guarantee' => ['type' => TabularForm::INPUT_TEXT],
        'artist_deposit' => ['type' => TabularForm::INPUT_TEXT],
        'artist_offer_type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Guarantee' => 'Guarantee', 'Split' => 'Split', 'Plus' => 'Plus', 'Vs.' => 'Vs.', 'Backend' => 'Backend', '' => '', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Artist Offer Type'],
                    ]
        ],
        'is_artist_production_buyout' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'artist_split' => ['type' => TabularForm::INPUT_TEXT],
        'promoter_profit' => ['type' => TabularForm::INPUT_TEXT],
        'expense_application' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Net' => 'Net', 'Gross' => 'Gross', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Expense Application'],
                    ]
        ],
        'sponsorship' => ['type' => TabularForm::INPUT_TEXT],
        'radius_clause' => ['type' => TabularForm::INPUT_TEXT],
        'radius_clause_metric' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Miles' => 'Miles', 'KM' => 'KM', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Radius Clause Metric'],
                    ]
        ],
        'pre_show_lockout' => ['type' => TabularForm::INPUT_TEXT],
        'pre_show_lockout_unit' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Days' => 'Days', 'Months' => 'Months', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Pre Show Lockout Unit'],
                    ]
        ],
        'post_show_lockout' => ['type' => TabularForm::INPUT_TEXT],
        'post_show_lockout_unit' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Days' => 'Days', 'Months' => 'Months', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Post Show Lockout Unit'],
                    ]
        ],
        'artist_deal_note' => ['type' => TabularForm::INPUT_TEXT],
        'support_artist_1_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'support_artist_1_total' => ['type' => TabularForm::INPUT_TEXT],
        'support_artist_2_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'support_artist_2_total' => ['type' => TabularForm::INPUT_TEXT],
        'support_artist_3_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'support_artist_3_total' => ['type' => TabularForm::INPUT_TEXT],
        'general_expense' => ['type' => TabularForm::INPUT_TEXT],
        'production_expense' => ['type' => TabularForm::INPUT_TEXT],
        'housenut_total' => ['type' => TabularForm::INPUT_TEXT],
        'housenut_expense' => ['type' => TabularForm::INPUT_TEXT],
        'general_expense_note' => ['type' => TabularForm::INPUT_TEXT],
        'variable_expense' => ['type' => TabularForm::INPUT_TEXT],
        'merch_buyout_venue_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_buyout_artist_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_artist_split_venue_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_artist_split_artist_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_artist_split_media_venue_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_artist_split_media_artist_sell' => ['type' => TabularForm::INPUT_TEXT],
        'merch_note' => ['type' => TabularForm::INPUT_TEXT],
        'artist_comp' => ['type' => TabularForm::INPUT_TEXT],
        'artist_comp_note' => ['type' => TabularForm::INPUT_TEXT],
        'production_comp' => ['type' => TabularForm::INPUT_TEXT],
        'production_comp_note' => ['type' => TabularForm::INPUT_TEXT],
        'promotional_comp' => ['type' => TabularForm::INPUT_TEXT],
        'promotional_comp_note' => ['type' => TabularForm::INPUT_TEXT],
        'house_comp' => ['type' => TabularForm::INPUT_TEXT],
        'house_comp_note' => ['type' => TabularForm::INPUT_TEXT],
        'kill' => ['type' => TabularForm::INPUT_TEXT],
        'kill_note' => ['type' => TabularForm::INPUT_TEXT],
        'comp_kill_note' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowOffer(' . $key . '); return false;', 'id' => 'offer-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Offer', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowOffer()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

