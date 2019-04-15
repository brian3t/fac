<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Microsite */

$this->title = 'Create Microsite';
$this->params['breadcrumbs'][] = ['label' => 'Microsite', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="microsite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
