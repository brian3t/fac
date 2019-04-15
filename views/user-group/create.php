<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserGroup */

$this->title = 'Create Agent Team';
$this->params['breadcrumbs'][] = ['label' => 'Agent Team', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
