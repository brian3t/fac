<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BandFollow */

$this->title = 'Create Band Follow';
$this->params['breadcrumbs'][] = ['label' => 'Band Follow', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="band-follow-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
