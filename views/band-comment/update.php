<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BandComment */

$this->title = 'Update Band Comment: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Band Comment', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="band-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
