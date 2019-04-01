<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MkRadio */

$this->title = 'Update Mk Radio: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mk Radio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mk-radio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
