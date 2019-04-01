<?php

use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BandEvent', 
        'relID' => 'band-event', 
        'value' => \yii\helpers\Json::encode($model->bandEvents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserEvent', 
        'relID' => 'user-event', 
        'value' => \yii\helpers\Json::encode($model->userEvents),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'user_id')->label('Event Owner')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'venue_id')->label('Venue')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Venue'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'date')->label('Event Date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php
    echo $form->field($model, 'start_time')->widget(TimePicker::classname(), []);
    ?>

    <?php
    echo $form->field($model, 'end_time')->widget(TimePicker::classname(), []);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true, 'placeholder' => 'Cost']) ?>

    <?= $form->field($model, 'min_cost')->textInput(['maxlength' => true, 'placeholder' => 'Min Cost']) ?>

    <?= $form->field($model, 'max_cost')->textInput(['maxlength' => true, 'placeholder' => 'Max Cost']) ?>

    <?= $form->field($model, 'is_charity')->textInput(['placeholder' => 'Is Charity']) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BandEvent'),
            'content' => $this->render('_formBandEvent', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->bandEvents),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UserEvent'),
            'content' => $this->render('_formUserEvent', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userEvents),
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
