<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/js/tinymce/tinymce.min.js', ['depends' => \yii\web\JqueryAsset::class, 'position' => \yii\web\View::POS_END]);
$this->registerJsFile('/js/page_update.js', ['depends' => \yii\web\JqueryAsset::class, 'position' => \yii\web\View::POS_END]);
?>
<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
<div class="row">
    <?= $form->field($model, 'project_id', ['options'  => ['class' => 'col-md-4']])->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Project::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Project','disabled'=>true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Project'); ?>

    <?php /*= $form->field($model, 'microsite_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Microsite::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Microsite'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?= $form->field($model, 'type', ['options'  => ['class' => 'col-md-4']])->dropDownList([ 'index' => 'Index', 'about' => 'About', 'content' => 'Content', 'blank' => 'Blank', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'name', ['options'  => ['class' => 'col-md-4']])->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
</div>
    <?= $form->field($model, 'html')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
        <?= Html::a('Preview', $model->getPreviewUrl() , ['class' => 'btn', 'target'=> '_blank']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
