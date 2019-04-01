<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Band */

?>
<div class="band-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'logo',
        'lno_score',
        'type',
        'genre',
        'similar_to',
        'hometown_city',
        'hometown_state',
        'description:ntext',
        'website:url',
        'youtube:url',
        'instagram:url',
        'facebook',
        'twitter',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>