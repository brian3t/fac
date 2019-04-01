<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'User', 
        'relID' => 'user', 
        'value' => \yii\helpers\Json::encode($model->users),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Venue', 
        'relID' => 'venue', 
        'value' => \yii\helpers\Json::encode($model->venues),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
    
    <?= $form->field($model, 'line_of_business')->dropDownList([ 'Management' => 'Management', 'Agency' => 'Agency', 'Promotion' => 'Promotion', 'Network' => 'Network', 'Studio' => 'Studio', 'Public Relations' => 'Public Relations', 'Consulting' => 'Consulting', 'Talent' => 'Talent', 'Client' => 'Client', 'Production Company' => 'Production Company', 'Photography' => 'Photography', 'Editing' => 'Editing', 'Business Management' => 'Business Management', 'Ticketing'=>'Ticketing', 'Tour Management' => 'Tour Management', 'Venue' => 'Venue', 'Personal' => 'Personal', 'Other' => 'Other', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']) ?>
    <?= $form->field($model, 'headline')->textInput(['maxlength' => true, 'placeholder' => 'Headline']) ?>
    <?= $form->field($model, 'industry')->textInput(['maxlength' => true, 'placeholder' => 'Industry']) ?>
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>
    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>

    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true, 'placeholder' => 'Postal Code']) ?>
    
    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'placeholder' => 'State']) ?>
    
    <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) ?>

    <?= $form->field($model, 'general_email')->textInput(['maxlength' => true, 'placeholder' => 'General Email']) ?>

    <?= $form->field($model, 'work_phone')->textInput(['maxlength' => true, 'placeholder' => 'Work Phone']) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'placeholder' => 'Fax']) ?>

    <?= $form->field($model, 'webpage')->textInput(['maxlength' => true, 'placeholder' => 'Webpage']) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>
    
    <?= $form->field($model, 'yahoo')->textInput(['maxlength' => true, 'placeholder' => 'Yahoo']) ?>

    <?= $form->field($model, 'linkedin_company_page')->textInput(['maxlength' => true, 'placeholder' => 'Linkedin Company Page']) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>

    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true, 'placeholder' => 'Instagram']) ?>

    <?= $form->field($model, 'google')->textInput(['maxlength' => true, 'placeholder' => 'Google']) ?>

    <?= $form->field($model, 'note')->textarea(['maxlength' => true, 'placeholder' => 'Note']) ?>

    <?= $form->field($model, 'belong_company_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Company'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('User'),
            'content' => $this->render('_formUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->users),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Venue'),
            'content' => $this->render('_formVenue', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->venues),
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
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
