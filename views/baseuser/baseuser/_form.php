<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
       'class' => 'Band',
       'relID' => 'band',
       'value' => \yii\helpers\Json::encode($model->bands),
       'isNewRecord' => ($model->isNewRecord) ? 1 : 0
   ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
   'viewParams' => [
       'class' => 'BandComment',
       'relID' => 'band-comment',
       'value' => \yii\helpers\Json::encode($model->bandComments),
       'isNewRecord' => ($model->isNewRecord) ? 1 : 0
   ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
   'viewParams' => [
       'class' => 'BandFollow',
       'relID' => 'band-follow',
       'value' => \yii\helpers\Json::encode($model->bandFollows),
       'isNewRecord' => ($model->isNewRecord) ? 1 : 0
   ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
   'viewParams' => [
       'class' => 'BandRate',
       'relID' => 'band-rate',
       'value' => \yii\helpers\Json::encode($model->bandRates),
       'isNewRecord' => ($model->isNewRecord) ? 1 : 0
   ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
   'viewParams' => [
       'class' => 'Event',
       'relID' => 'event',
       'value' => \yii\helpers\Json::encode($model->events),
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
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
   'viewParams' => [
       'class' => 'Venue',
       'relID' => 'venue',
       'value' => \yii\helpers\Json::encode($model->venues),
       'isNewRecord' => ($model->isNewRecord) ? 1 : 0
   ]
]);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'confirmed_at')->textInput(['placeholder' => 'Confirmed At']) ?>

    <?= $form->field($model, 'unconfirmed_email')->textInput(['maxlength' => true, 'placeholder' => 'Unconfirmed Email']) ?>

    <?= $form->field($model, 'blocked_at')->textInput(['placeholder' => 'Blocked At']) ?>

    <?= $form->field($model, 'registration_ip')->textInput(['maxlength' => true, 'placeholder' => 'Registration Ip']) ?>

    <?= $form->field($model, 'flags')->textInput(['placeholder' => 'Flags']) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true, 'placeholder' => 'Note']) ?>

    <?= $form->field($model, 'phone_number_type')->dropDownList([ 'Home' => 'Home', 'Business' => 'Business', 'Cell' => 'Cell', 'Fax' => 'Fax', 'Other' => 'Other', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>

   <?= $form->field($model, 'birth_month')->textInput(['placeholder' => 'Birth Month']) ?> 
 
   <?= $form->field($model, 'birth_year')->textInput(['placeholder' => 'Birth Year']) ?> 
 
   <?= $form->field($model, 'favorite_genres')->textInput(['placeholder' => 'Favorite Genres']) ?> 
 
   <?= $form->field($model, 'favorite_venue_types')->textInput(['placeholder' => 'Favorite Venue Types']) ?> 
 
    <?= $form->field($model, 'birthdate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Birthdate',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'website_url')->textInput(['maxlength' => true, 'placeholder' => 'Website Url']) ?>

    <?= $form->field($model, 'twitter_id')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>

    <?= $form->field($model, 'facebook_id')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>

    <?= $form->field($model, 'instagram_id')->textInput(['maxlength' => true, 'placeholder' => 'Instagram']) ?>

    <?= $form->field($model, 'google_id')->textInput(['maxlength' => true, 'placeholder' => 'Google']) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) ?>
    
    <?= $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) ?>
    
    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>
    
    <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'placeholder' => 'State']) ?>
    
    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true, 'placeholder' => 'Zipcode']) ?>
    
    <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'placeholder' => 'Country']) ?>

   <?= $form->field($model, 'last_login_at')->textInput(['placeholder' => 'Last Login At']) ?>
   <?php
   $forms = [
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Band'),
           'content' => $this->render('_formBand', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->bands),
           ]),
       ],
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BandComment'),
           'content' => $this->render('_formBandComment', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->bandComments),
           ]),
       ],
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BandFollow'),
           'content' => $this->render('_formBandFollow', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->bandFollows),
           ]),
       ],
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BandRate'),
           'content' => $this->render('_formBandRate', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->bandRates),
           ]),
       ],
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Event'),
           'content' => $this->render('_formEvent', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->events),
           ]),
       ],
       [
           'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UserEvent'),
           'content' => $this->render('_formUserEvent', [
               'row' => \yii\helpers\ArrayHelper::toArray($model->userEvents),
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
