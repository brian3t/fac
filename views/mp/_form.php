<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mp */
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

<div class="mp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'end_point_name')->textInput(['maxlength' => true, 'placeholder' => 'End Point Name']) ?>

    <?= $form->field($model, 'currency_code')->dropDownList([ 'USD' => 'USD', 'AUD' => 'AUD', 'CAD' => 'CAD', 'CHF' => 'CHF', 'EUR' => 'EUR', 'GBP' => 'GBP', 'HKD' => 'HKD', 'MXN' => 'MXN', 'NZD' => 'NZD', 'PLN' => 'PLN', 'SGD' => 'SGD', ], ['prompt' => '']) ?>

    <div class="form-group" id="add-order"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
