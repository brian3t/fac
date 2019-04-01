<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Order', 
        'relID' => 'order', 
        'value' => \yii\helpers\Json::encode($model->orders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true, 'placeholder' => 'Company']) ?>

    <?= $form->field($model, 'email_address')->textInput(['maxlength' => true, 'placeholder' => 'Email Address']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>

    <?= $form->field($model, 'mp_customer_id')->textInput(['maxlength' => true, 'placeholder' => 'Mp Customer']) ?>

    <?= $form->field($model, 'created_at')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Created At'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'updated_at')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Updated At'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <div class="form-group" id="add-order"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
