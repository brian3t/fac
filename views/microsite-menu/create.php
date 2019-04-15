<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MicrositeMenu */

$this->title = 'Create Microsite Menu';
$this->params['breadcrumbs'][] = ['label' => 'Microsite Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="microsite-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
