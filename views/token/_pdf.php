<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Token */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Token', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="token-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Token'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'user.username',
                'label' => 'User'
            ],
        'code',
        'created_at',
        'type',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
