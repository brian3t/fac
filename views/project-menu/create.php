<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectMenu */

$this->title = 'Create Project Menu';
$this->params['breadcrumbs'][] = ['label' => 'Project Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
