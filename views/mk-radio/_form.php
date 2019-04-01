<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MkRadio */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="mk-radio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'marketing_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Marketing::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Marketing'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'company_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'station')->textInput(['maxlength' => true, 'placeholder' => 'Station']) ?>

    <?= $form->field($model, 'format')->textInput(['maxlength' => true, 'placeholder' => 'Format']) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true, 'placeholder' => 'Contact']) ?>

    <?= $form->field($model, 'contact_phone_email')->textInput(['maxlength' => true, 'placeholder' => 'Contact Phone Email']) ?>

    <?= $form->field($model, 'promo_mentions')->textInput(['placeholder' => 'Promo Mentions']) ?>

    <?= $form->field($model, 'promo_tickets')->textInput(['placeholder' => 'Promo Tickets']) ?>

    <?= $form->field($model, 'promo_value')->textInput(['maxlength' => true, 'placeholder' => 'Promo Value']) ?>

    <?= $form->field($model, 'promo_run_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Promo Run From',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'promo_run_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Promo Run To',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'paid_run_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Paid Run From',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'paid_run_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Paid Run To',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'paid_spots')->textInput(['placeholder' => 'Paid Spots']) ?>

    <?= $form->field($model, 'thirty')->textInput(['maxlength' => true, 'placeholder' => 'Thirty']) ?>

    <?= $form->field($model, 'sixty')->textInput(['maxlength' => true, 'placeholder' => 'Sixty']) ?>

    <?= $form->field($model, 'gross')->textInput(['maxlength' => true, 'placeholder' => 'Gross']) ?>

    <?= $form->field($model, 'net')->textInput(['maxlength' => true, 'placeholder' => 'Net']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
