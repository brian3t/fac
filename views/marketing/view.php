<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Marketing */

$this->title = $model->offer->event_id;
$this->params['breadcrumbs'][] = ['label' => 'Marketing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marketing-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Marketing for '.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'offer.id',
            'label' => 'Offer',
        ],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
		'created_at',
		'updated_at'
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'company_id',
        'email',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>Offer<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnOffer = [
        ['attribute' => 'id', 'visible' => false],
        'offer_type',
        'event_id',
    ];
    echo DetailView::widget([
        'model' => $model->offer,
        'attributes' => $gridColumnOffer    ]);
    ?>
    
    <div class="row">
<?php
if($providerMkRadio->totalCount){
    $gridColumnMkRadio = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'company.name',
                'label' => 'Company'
            ],
            'station',
            'format',
            'contact',
            'contact_phone_email:email',
            'promo_mentions',
            'promo_tickets',
            'promo_value',
            'promo_run_from',
            'promo_run_to',
            'paid_run_from',
            'paid_run_to',
            'paid_spots',
            'thirty',
            'sixty',
            'gross',
            'net',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMkRadio,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mk-radio']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Mk Radio'),
        ],
        'export' => false,
        'columns' => $gridColumnMkRadio
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerMkTelevision->totalCount){
    $gridColumnMkTelevision = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'company.name',
                'label' => 'Company'
            ],
            'format',
            'contact',
            'phone_email:email',
            'impressions',
            'promo_tickets',
            'promo_value',
            'promo_run_from',
            'promo_run_to',
            'paid_run_from',
            'paid_run_to',
            'qty',
            'dg_code',
            'gross',
            'net',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMkTelevision,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mk-television']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Mk Television'),
        ],
        'export' => false,
        'columns' => $gridColumnMkTelevision
    ]);
}
?>

    </div>
</div>
