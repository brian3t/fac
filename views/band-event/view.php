<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BandEvent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Band Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="band-event-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Band Event'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'band.name',
            'label' => 'Band',
        ],
        [
            'attribute' => 'event.name',
            'label' => 'Event',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Band<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBand = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'user_id',
        'logo',
        'lno_score',
        'type',
        'similar_to',
        'hometown_city',
        'hometown_state',
        'description',
        'website',
        'facebook',
        'twitter',
    ];
    echo DetailView::widget([
        'model' => $model->band,
        'attributes' => $gridColumnBand    ]);
    ?>
    <div class="row">
        <h4>Event<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnEvent = [
        ['attribute' => 'id', 'visible' => false],
        'user_id',
        'venue_id',
        'date',
        'start_time',
        'end_time',
        'name',
        'description',
        'cost',
        'is_charity',
        'twitter',
        'facebook',
        'website',
    ];
    echo DetailView::widget([
        'model' => $model->event,
        'attributes' => $gridColumnEvent    ]);
    ?>
</div>
