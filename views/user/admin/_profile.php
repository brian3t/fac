<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View 					$this
 * @var dektrium\user\models\User 		$user
 * @var dektrium\user\models\Profile 	$profile
 */

?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?= $form->field($profile, 'name') ?>
<?= $form->field($profile, 'public_email') ?>
<?php
if (! empty($profile->avatar)):
    ?>
    <div class="form-group ">
        <label class="col-lg-3 control-label" for="profile-display-avatar">Current profile
            picture</label>
        
        <div class="col-lg-9">
            <img src= "<?= API_BASE ?>img/avatar/<?= \Yii::$app->user->id . '/' . $profile->avatar ?>" class="avatar"
                 alt="avatar">
        </div>
        <div class="col-sm-offset-3 col-lg-9">
            <div class="help-block"></div>
        </div>
    </div>
    <?php
endif;
?>
<?= $form->field($profile, 'avatarFile')->fileInput()->label('Upload new profile picture') ?>
<?//= $form->field($profile, 'website') ?>
<?= $form->field($profile, 'location') ?>
<?= $form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'bio')->textarea() ?>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
