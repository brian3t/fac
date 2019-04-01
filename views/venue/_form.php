<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

chdir(dirname(dirname(__DIR__)));
require_once 'models/constants.php';

/* @var $this yii\web\View */
/* @var $model app\models\Venue */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Event', 
        'relID' => 'event', 
        'value' => \yii\helpers\Json::encode($model->events),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="venue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'user_id')->label('Venue owner')->widget(\kartik\widgets\Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'placeholder' => 'Type']) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>

    <?= $form->field($model, 'state')->dropDownList(STATES, ['placeholder' => 'Hometown State']) ?>

    <?= $form->field($model, 'zip')->textInput(['maxlength' => true, 'placeholder' => 'Zip']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true, 'placeholder' => 'Cost']) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Event'),
            'content' => $this->render('_formEvent', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->events),
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
