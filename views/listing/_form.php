<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Listing */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Microsite', 
        'relID' => 'microsite', 
        'value' => \yii\helpers\Json::encode($model->microsites),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="listing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true, 'placeholder' => 'Country Code']) ?>

    <?= $form->field($model, 'city')->dropDownList([ 'north' => 'North', 'west' => 'West', 'north-east' => 'North-east', 'east' => 'East', 'central' => 'Central', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true, 'placeholder' => 'District']) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true, 'placeholder' => 'Area']) ?>

    <?= $form->field($model, 'property_type')->dropDownList([ 'Condominium' => 'Condominium', 'Apartment' => 'Apartment', 'Strata Landed' => 'Strata Landed', 'Commercial' => 'Commercial', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'developer_id')->textInput(['placeholder' => 'Developer']) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true, 'placeholder' => 'Postal Code']) ?>

    <?= $form->field($model, 'total_unit')->textInput(['placeholder' => 'Total Unit']) ?>

    <?= $form->field($model, 'tenure')->dropDownList([ '60-year Leasehold' => '60-year Leasehold', '99-year Leasehold' => '99-year Leasehold', 'Leasehold' => 'Leasehold', 'Freehold' => 'Freehold', 'Leasehold: 35 years' => 'Leasehold: 35 years', 'Leasehold: 150 years' => 'Leasehold: 150 years', 'Leasehold : 30 years' => 'Leasehold : 30 years', 'Leasehold : 999 years' => 'Leasehold : 999 years', ], ['prompt' => '']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Microsite'),
            'content' => $this->render('_formMicrosite', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->microsites),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
