<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MkTelevision */

$this->title = 'Update Mk Television: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mk Television', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mk-television-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
