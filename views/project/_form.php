<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Gallery',
        'relID' => 'gallery',
        'value' => \yii\helpers\Json::encode($model->gallery),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Microsite',
        'relID' => 'microsite',
        'value' => \yii\helpers\Json::encode($model->microsites),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'Page',
        'relID' => 'page',
        'value' => \yii\helpers\Json::encode($model->pages),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id',
                function ($model) {
                    return implode(' ', [$model['first_name'], $model['last_name']]);
                }),
            'options' => ['placeholder' => 'Choose Agent'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

        <?= $form->field($model, 'use_own_domain')->checkbox(['disabled' => 'disabled']) ?>

        <?php $domain_display = 'none';
        if ($model->use_own_domain) {
            $domain_display = 'block';
        }
        ?>
        <?= $form->field($model, 'domain', ['options' => ['style' => "display:$domain_display"]])->textInput(['maxlength' => true, 'placeholder' => 'Domain']); ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder' => 'Url']) ?>

        <?= $form->field($model, 'full_url')->textInput(['maxlength' => true, 'placeholder' => 'Full url is generated automatically by system after saving', 'disabled' => true]) ?>

        <?= $form->field($model, 'country_code')->dropDownList(COUNTRIES) ?>

        <?= $form->field($model, 'logo')->textInput(['maxlength' => true, 'placeholder' => 'Logo']) ?>

        <?= $form->field($model, 'favicon')->textInput(['maxlength' => true, 'placeholder' => 'Favicon']) ?>

        <?= $form->field($model, 'type')->dropDownList(['normal' => 'Normal', 'template' => 'Template', 'cloned' => 'Cloned',], ['prompt' => '']) ?>

        <?= $form->field($model, 'biz_contact_name')->textInput(['maxlength' => true, 'placeholder' => 'Biz Contact Name']) ?>

        <?= $form->field($model, 'does_enable_phone_display')->checkbox() ?>

        <?= $form->field($model, 'does_enable_email_display')->checkbox() ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

        <?= $form->field($model, 'sms')->textInput(['maxlength' => true, 'placeholder' => 'Sms']) ?>

        <?= $form->field($model, 'whatsapp')->textInput(['maxlength' => true, 'placeholder' => 'Whatsapp']) ?>

        <?= $form->field($model, 'wechatid')->textInput(['maxlength' => true, 'placeholder' => 'Wechatid']) ?>

        <?= $form->field($model, 'wechat_image')->textInput(['maxlength' => true, 'placeholder' => 'Wechat Image']) ?>

        <?= $form->field($model, 'phone2')->textInput(['maxlength' => true, 'placeholder' => 'Phone2']) ?>

        <?= $form->field($model, 'email2')->textInput(['maxlength' => true, 'placeholder' => 'Email2']) ?>

        <?= $form->field($model, 'phone3')->textInput(['maxlength' => true, 'placeholder' => 'Phone3']) ?>

        <?= $form->field($model, 'email3')->textInput(['maxlength' => true, 'placeholder' => 'Email3']) ?>

        <?= $form->field($model, 'does_use_footer')->checkbox() ?>

        <?= $form->field($model, 'footer')->textInput(['maxlength' => true, 'placeholder' => 'Footer']) ?>

        <?= $form->field($model, 'does_use_credit_text')->checkbox() ?>

        <?= $form->field($model, 'credit_text')->textInput(['maxlength' => true, 'placeholder' => 'Credit Text']) ?>

        <?= $form->field($model, 'default_page_title')->textInput(['maxlength' => true, 'placeholder' => 'Default Page Title']) ?>

        <?= $form->field($model, 'default_meta_description')->textInput(['maxlength' => true, 'placeholder' => 'Default Meta Description']) ?>

        <?= $form->field($model, 'default_meta_keywords')->textInput(['maxlength' => true, 'placeholder' => 'Default Meta Keywords']) ?>

        <?= $form->field($model, '404page_id')->textInput(['placeholder' => '404page']) ?>

        <?= $form->field($model, 'thankspage_id')->textInput(['placeholder' => 'Thankspage']) ?>

        <?= $form->field($model, 'g_search_site_verification')->textInput(['maxlength' => true, 'placeholder' => 'G Search Site Verification']) ?>

        <?= $form->field($model, 'g_global_site_tags')->textInput(['maxlength' => true, 'placeholder' => 'G Global Site Tags']) ?>

        <?= $form->field($model, 'g_remarketing_tag')->textInput(['maxlength' => true, 'placeholder' => 'G Remarketing Tag']) ?>

        <?= $form->field($model, 'facebook_pixel_code')->textInput(['maxlength' => true, 'placeholder' => 'Facebook Pixel Code']) ?>

        <?= $form->field($model, 'does_enable_custom_robots')->checkbox() ?>

        <?= $form->field($model, 'custom_robots')->textInput(['maxlength' => true, 'placeholder' => 'Custom Robots']) ?>

        <?= $form->field($model, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>

        <?= $form->field($model, 'youtube')->textInput(['maxlength' => true, 'placeholder' => 'Youtube']) ?>

        <?= $form->field($model, 'instagram')->textInput(['maxlength' => true, 'placeholder' => 'Instagram']) ?>

        <?= $form->field($model, 'linkedin')->textInput(['maxlength' => true, 'placeholder' => 'Linkedin']) ?>

        <?= $form->field($model, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>

        <?= $form->field($model, 'googleplus')->textInput(['maxlength' => true, 'placeholder' => 'Googleplus']) ?>
    </div>
    <div class="col-md-8">
        <?php
        $forms = [
            /*[
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Microsite'),
                'content' => $this->render('_formMicrosite', [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->microsites),
                ]),
            ],*/
            [
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Page'),
                'content' => $this->render('_formPage', [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->pages),
                ]),
            ],
            /*[
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Gallery'),
                'content' => $this->render('_formGallery', [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->gallery),
                ]),
            ],*/
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
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Preview', $model->full_url, ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
