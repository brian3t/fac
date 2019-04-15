<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Microsite */

$this->title = 'Update Microsite: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Microsite', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="microsite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
