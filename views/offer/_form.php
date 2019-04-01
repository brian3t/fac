<?php

use kartik\datetime\DateTimePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//use kartik\time\TimePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Offer */
/* @var $form app\views\widgets\ActiveForm */

?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'user_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'offer_type', ['options' => ['class' => 'form-group col-sm-5']])->dropDownList([
        'Icon' => 'Icon',
        'Co-Pro Promoter' => 'Co-Pro Promoter',
        'Co-Pro Venue' => 'Co-Pro Venue',
        '3rd Party' => '3rd Party',
    ]) ?>

    <?= $form->field($model, 'copro_promoter_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'copro_venue_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Venue'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'event_id', ['options' => ['class' => 'form-group col-sm-10']])->textInput(['maxlength' => true, 'placeholder' => 'Event']) ?>

    <?= $form->field($model, 'show_number', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Show Number']) ?>

    <?= $form->field($model, 'show_total_num', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Show Total Num']) ?>

    <?= $form->field($model, 'agency_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'agent_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'status', ['options' => ['class' => 'form-group col-sm-5']])->dropDownList([
        'New' => 'New',
        'Submitted' => 'Submitted',
        'Pending' => 'Pending',
        'Reviewed' => 'Reviewed',
        'Declined' => 'Declined',
        'Confirmed' => 'Confirmed',
        'Revised' => 'Revised',
        'Signed' => 'Signed',
        'Unsubmitted' => 'Unsubmitted',
    ], ['prompt' => null]) ?>

    <?= $form->field($model, 'artist_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'venue_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Venue'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'show_date', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Show Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'is_tbd_date', ['options' => ['class' => 'form-group col-sm-5']])->checkbox(['placeholder' => 'Is Tbd Date']) ?>

    <?= $form->field($model, 'show_type', ['options' => ['class' => 'form-group col-sm-5']])->dropDownList([
        'Private' => 'Private',
        'Public' => 'Public',
        'College' => 'College',
        'College - Private' => 'College - Private',
        'Casino' => 'Casino',
        'Fair' => 'Fair',
        'Festival' => 'Festival',
    ], ['prompt' => '']) ?>

    <?php /*= $form->field($model, 'doors', ['options' => ['class' => 'form-group col-sm-5']])->widget(Datetimepicker::className(), [
        'options' => [
            'format' => 'H:i',
            'seconds' => false,
            'step' => 15,
            'timepicker' => true,
            'datepicker' => false
        ]
    ]); */ ?>
    <?=
    $form->field($model, 'doors', ['options' => ['class' => 'form-group col-sm-5']])->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Select door time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'H:i',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <!--    --><?php /*= $form->field($model, 'showtime', ['options' => ['class' => 'form-group col-sm-5']])->widget(Datetimepicker::className(), [
        'options' => [
            'format' => 'H:i',
            'seconds' => false,
            'step' => 15,
            'timepicker' => true,
            'datepicker' => false
        ]
    ]); */ ?>

    <?=
    $form->field($model, 'showtime', ['options' => ['class' => 'form-group col-sm-5']])->widget(Datetimepicker::classname(),
        [
            'options' => ['placeholder' => 'Select showtime ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'H:i',
                'todayHighlight' => true
            ]
        ]);

    ?>

    <?= $form->field($model, 'notes', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'Notes']) ?>

    <?= $form->field($model, 'l1_gross_ticket', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L1 Gross Ticket']) ?>

    <?= $form->field($model, 'l1_kill', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L1 Kill']) ?>

    <?= $form->field($model, 'l1_price', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'L1 Price']) ?>

    <?= $form->field($model, 'l2_gross_ticket', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L2 Gross Ticket']) ?>

    <?= $form->field($model, 'l2_kill', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L2 Kill']) ?>

    <?= $form->field($model, 'l2_price', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'L2 Price']) ?>

    <?= $form->field($model, 'l3_gross_ticket', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L3 Gross Ticket']) ?>

    <?= $form->field($model, 'l3_kill', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L3 Kill']) ?>

    <?= $form->field($model, 'l3_price', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'L3 Price']) ?>

    <?= $form->field($model, 'l4_gross_ticket', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L4 Gross Ticket']) ?>

    <?= $form->field($model, 'l4_kill', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L4 Kill']) ?>

    <?= $form->field($model, 'l4_price', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'L4 Price']) ?>

    <?= $form->field($model, 'l5_gross_ticket', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L5 Gross Ticket']) ?>

    <?= $form->field($model, 'l5_kill', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['placeholder' => 'L5 Kill']) ?>

    <?= $form->field($model, 'l5_price', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'L5 Price']) ?>

    <?= $form->field($model, 'on_sale_date', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose On Sale Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'is_on_sale_date_tbd', ['options' => ['class' => 'form-group col-sm-5']])->checkbox(['placeholder' => 'Is On Sale Date Tbd']) ?>

    <?= $form->field($model, 'ticketing_company_id', ['options' => ['class' => 'form-group col-sm-10']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'seating_plan', ['options' => ['class' => 'form-group col-sm-10']])->textInput(['maxlength' => true, 'placeholder' => 'Seating Plan']) ?>

    <?= $form->field($model, 'tax', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['maxlength' => true, 'placeholder' => 'Tax']) ?>

    <?= $form->field($model, 'tax_note', ['options' => ['class' => 'form-group col-sm-3']])->textarea(['maxlength' => true, 'placeholder' => 'Tax Note']) ?>

    <?= $form->field($model, 'tax_per_ticket', ['options' => ['class' => 'form-group col-sm-4']])->textInput(['maxlength' => true, 'placeholder' => 'Tax Per Ticket']) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'facility_fee', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Facility Fee']) ?>

    <?= $form->field($model, 'facility_fee_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'Facility Fee Note']) ?>

    <?= $form->field($model, 'artist_guarantee', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['maxlength' => true, 'placeholder' => 'Artist Guarantee']) ?>

    <?= $form->field($model, 'artist_deposit', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['maxlength' => true, 'placeholder' => 'Artist Deposit']) ?>

    <?= $form->field($model, 'artist_offer_type', ['options' => ['class' => 'form-group col-sm-4']])->dropDownList([
        'Guarantee' => 'Guarantee',
        'Split' => 'Split',
        'Plus' => 'Plus',
        'Vs.' => 'Vs.',
        'Backend' => 'Backend',
    ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_artist_production_buyout', ['options' => ['class' => 'form-group col-sm-5']])->checkbox() ?>

    <?= $form->field($model, 'artist_split', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Artist Split']) ?>

    <?= $form->field($model, 'promoter_profit', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Promoter Profit']) ?>

    <?= $form->field($model, 'expense_application', ['options' => ['class' => 'form-group col-sm-5']])->dropDownList(['Net' => 'Net', 'Gross' => 'Gross']) ?>

    <?= $form->field($model, 'sponsorship', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Sponsorship']) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'radius_clause', ['options' => ['class' => 'form-group col-sm-3']])->textInput(['maxlength' => true, 'placeholder' => 'Radius Clause']) ?>

    <?= $form->field($model, 'radius_clause_metric', ['options' => ['class' => 'form-group col-sm-2']])->dropDownList(['Miles' => 'Miles', 'KM' => 'KM',]) ?>

    <?= $form->field($model, 'pre_show_lockout', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['placeholder' => 'Pre Show Lockout']) ?>

    <?= $form->field($model, 'pre_show_lockout_unit', ['options' => ['class' => 'form-group col-sm-3']])->dropDownList(['Days' => 'Days', 'Months' => 'Months',]) ?>

    <?= $form->field($model, 'post_show_lockout', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Post Show Lockout']) ?>

    <?= $form->field($model, 'post_show_lockout_unit', ['options' => ['class' => 'form-group col-sm-5']])->dropDownList(['Days' => 'Days', 'Months' => 'Months',]) ?>

    <?= $form->field($model, 'artist_deal_note', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'Artist Deal Note']) ?>

    <?= $form->field($model, 'support_artist_1_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'support_artist_1_total', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Support Artist 1 Total']) ?>

    <?= $form->field($model, 'support_artist_2_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'support_artist_2_total', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Support Artist 2 Total']) ?>

    <?= $form->field($model, 'support_artist_3_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'support_artist_3_total', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Support Artist 3 Total']) ?>

    <?= $form->field($model, 'general_expense', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'General Expense', 'readonly' => true, 'rows' => 10]) ?>

    <?= $form->field($model, 'production_expense', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'Production Expense', 'readonly' => true, 'rows' => 3]) ?>

    <?= $form->field($model, 'housenut_total', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Housenut Total']) ?>

    <?= $form->field($model, 'housenut_expense', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['maxlength' => true, 'placeholder' => 'Housenut Expense']) ?>

    <?= $form->field($model, 'general_expense_note', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'General Expense Note']) ?>

    <?= $form->field($model, 'variable_expense', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'Variable Expense', 'readonly' => true, 'rows' => 5]) ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'merch_buyout_venue_sell', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Buyout Venue Sell']) ?>

    <?= $form->field($model, 'merch_buyout_artist_sell', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Buyout Artist Sell']) ?>

    <?= $form->field($model, 'merch_artist_split_venue_sell', ['options' => ['class' => 'form-group col-sm-2 col-sm-offset-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Artist Split Venue Sell']) ?>

    <?= $form->field($model, 'merch_artist_split_artist_sell', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Artist Split Artist Sell']) ?>

    <div class="clearfix"></div>


    <?= $form->field($model, 'merch_venue_split_venue_sell', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Venue Split Venue Sell']) ?>

    <?= $form->field($model, 'merch_artist_split_media_venue_sell', ['options' => ['class' => 'form-group col-sm-2 col-sm-offset-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Venue Split Artist Sell']) ?>

    <?= $form->field($model, 'merch_artist_split_media_artist_sell', ['options' => ['class' => 'form-group col-sm-2 ']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Artist Split Media Artist Sell']) ?>

    <div class="clearfix"></div>

    <?= $form->field($model, 'merch_venue_split_media_venue_sell', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Merch Venue Split Media Venue Sell']) ?>

    <?= $form->field($model, 'merch_note', ['options' => ['class' => 'form-group col-sm-6']])->textarea(['maxlength' => true, 'placeholder' => 'Merch Note']) ?>

    <?= $form->field($model, 'artist_comp', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Artist Comp']) ?>

    <?= $form->field($model, 'artist_comp_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'Artist Comp Note']) ?>

    <?= $form->field($model, 'production_comp', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Production Comp']) ?>

    <?= $form->field($model, 'production_comp_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'Production Comp Note']) ?>

    <?= $form->field($model, 'promotional_comp', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Promotional Comp']) ?>

    <?= $form->field($model, 'promotional_comp_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'Promotional Comp Note']) ?>

    <?= $form->field($model, 'house_comp', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'House Comp']) ?>

    <?= $form->field($model, 'house_comp_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'House Comp Note']) ?>

    <?= $form->field($model, 'kill', ['options' => ['class' => 'form-group col-sm-5']])->textInput(['placeholder' => 'Kill']) ?>

    <?= $form->field($model, 'kill_note', ['options' => ['class' => 'form-group col-sm-5']])->textarea(['maxlength' => true, 'placeholder' => 'Kill Note']) ?>

    <?= $form->field($model, 'comp_kill_note', ['options' => ['class' => 'form-group col-sm-10']])->textarea(['maxlength' => true, 'placeholder' => 'Comp Kill Note']) ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'ascap_0_2500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 0 2500']) ?>
    <?= $form->field($model, 'ascap_2501_5000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 2501 5000']) ?>
    <?= $form->field($model, 'ascap_5001_10000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 5001 10000']) ?>
    <?= $form->field($model, 'ascap_10001_25000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 10001 25000']) ?>
    <?= $form->field($model, 'ascap_25001_x', ['options' => ['class' => 'form-group col-sm-2 ']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 25001 X']) ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'bmi_0_2500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 0 2500']) ?>
    <?= $form->field($model, 'bmi_2501_3500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 2501 3500']) ?>
    <?= $form->field($model, 'bmi_3501_5000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 3501 5000']) ?>
    <?= $form->field($model, 'bmi_5001_10000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 5001 10000']) ?>
    <?= $form->field($model, 'bmi_10001_x', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 10001 X']) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'belong_company_id', ['options' => ['class' => 'form-group col-sm-5']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <div class="clearfix"></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
