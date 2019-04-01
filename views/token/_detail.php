<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Token */

?>
<div class="token-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->user_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'user.username',
            'label' => 'User',
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