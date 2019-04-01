<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MkRadio */

$this->title = 'Create Mk Radio';
$this->params['breadcrumbs'][] = ['label' => 'Mk Radio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mk-radio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
