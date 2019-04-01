<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

?>
<div class="event-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        [
            'attribute' => 'venue.name',
            'label' => 'Venue',
        ],
        'date',
        'start_time',
        'end_time',
        'name',
        'description:ntext',
        'cost',
        'min_cost',
        'max_cost',
        'is_charity',
        'twitter',
        'facebook',
        'website',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>