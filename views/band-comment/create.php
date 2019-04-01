<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BandComment */

$this->title = 'Create Band Comment';
$this->params['breadcrumbs'][] = ['label' => 'Band Comment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="band-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
