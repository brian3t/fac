<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MkTelevision */

$this->title = 'Create Mk Television';
$this->params['breadcrumbs'][] = ['label' => 'Mk Television', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mk-television-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
