<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tracking */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tracking-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'retailops_order_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Order::find()->orderBy('retailops_order_id')->asArray()->all(), 'retailops_order_id', 'name'),
        'options' => ['placeholder' => 'Choose Order'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'sku')->textInput(['maxlength' => true, 'placeholder' => 'Sku']) ?>

    <?= $form->field($model, 'tracking_number')->textInput(['maxlength' => true, 'placeholder' => 'Tracking Number']) ?>

    <?= $form->field($model, 'tracking_carrier')->textInput(['maxlength' => true, 'placeholder' => 'Tracking Carrier']) ?>

    <?= $form->field($model, 'ship_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Ship Date'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
