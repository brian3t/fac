<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Settlement */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="settlement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'settlement_id')->textInput(['maxlength' => true, 'placeholder' => 'Settlement']) ?>

    <?= $form->field($model, 'first_party_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'first_party_event_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Offer::find()->orderBy('id')->asArray()->all(), 'id', 'event_id'),
        'options' => ['placeholder' => 'Choose Offer'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'first_party_capacity')->textInput(['placeholder' => 'First Party Capacity']) ?>

    <?= $form->field($model, 'second_party_event_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Offer::find()->orderBy('id')->asArray()->all(), 'id', 'event_id'),
        'options' => ['placeholder' => 'Choose Offer'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'second_party_capacity')->textInput(['placeholder' => 'Second Party Capacity']) ?>

    <?= $form->field($model, 'second_party_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Second Party Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'second_party_artist_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'second_party_venue_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Venue'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true, 'placeholder' => 'Note']) ?>

    <?= $form->field($model, 'artist_walkout_final')->input('number', ['value' => $model->artist_walkout_final ?? 0, 'maxlength' => true, 'placeholder' => 'Artist Walkout Final']) ?>

    <?= $form->field($model, 'ad_plan_final')->input('number', ['value' => $model->ad_plan_final??0, 'maxlength' => true, 'placeholder' => 'Ad Plan Final']) ?>

    <?= $form->field($model, 'promoter_revenue_final')->input('number', ['value' => $model->promoter_revenue_final??0, 'maxlength' => true, 'placeholder' => 'Promoter Revenue Final']) ?>

    <?= $form->field($model, 'ticket_sales_final')->input('number', ['value' => $model->ticket_sales_final??0, 'maxlength' => true, 'placeholder' => 'Ticket Sales Final']) ?>

    <?= $form->field($model, 'belong_company_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
