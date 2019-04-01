<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BandEvent */

$this->title = 'Create Band Event';
$this->params['breadcrumbs'][] = ['label' => 'Band Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="band-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
