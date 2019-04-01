<?php

/* @var $this yii\web\View */
/* @var $model app\models\base\CompanyUser */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?= $form->field($CompanyUser, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($CompanyUser, 'role')->dropDownList([ 'administrator' => 'Administrator', 'member' => 'Member', 'client' => 'Client', ], ['prompt' => '']) ?>

</div>
