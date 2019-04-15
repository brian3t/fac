<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MicrositeMenu */

$this->title = 'Update Microsite Menu: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Microsite Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="microsite-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
