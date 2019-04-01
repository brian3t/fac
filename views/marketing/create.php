<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Marketing */

$this->title = 'Create Marketing';
$this->params['breadcrumbs'][] = ['label' => 'Marketing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marketing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
