<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BandEvent */

$this->title = 'Update Band Event: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Band Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="band-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
