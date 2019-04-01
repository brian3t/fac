<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Save As New Profile: '. ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
