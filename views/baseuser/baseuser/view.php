<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User'.' '. Html::encode($this->title) ?></h2>
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
        'username',
        'email:email',
        'password_hash',
        'auth_key',
        'confirmed_at',
        'unconfirmed_email:email',
        'blocked_at',
        'registration_ip',
        'created_at',
        'updated_at',
        'flags',
        'first_name',
        'last_name',
        'note',
        'phone_number_type',
        'phone_number',
        'birthdate',
		'birth_month', 
		'birth_year', 
		'favorite_genres', 
		'favorite_venue_types', 
        'website_url:url',
        'twitter_id',
        'facebook_id',
        'instagram_id',
        'google_id',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
   <div class="row">
<?php
if($providerBand->totalCount){
   $gridColumnBand = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
           'name',
		   'logo',
           'lno_score',
            'type',
            'similar_to',
           'hometown_city',
           'hometown_state',
           'description:ntext',
           'website',
           'facebook',
           'twitter',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerBand,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-band']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Band'),
       ],
       'export' => false,
       'columns' => $gridColumnBand
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerBandComment->totalCount){
   $gridColumnBandComment = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
           [
               'attribute' => 'band.name',
               'label' => 'Band'
           ],
           'comment',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerBandComment,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-band-comment']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Band Comment'),
       ],
       'export' => false,
       'columns' => $gridColumnBandComment
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerBandFollow->totalCount){
   $gridColumnBandFollow = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
                       [
               'attribute' => 'band.name',
               'label' => 'Band'
           ],
   ];
   echo Gridview::widget([
       'dataProvider' => $providerBandFollow,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-band-follow']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Band Follow'),
       ],
       'export' => false,
       'columns' => $gridColumnBandFollow
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerBandRate->totalCount){
   $gridColumnBandRate = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
                       [
               'attribute' => 'band.name',
               'label' => 'Band'
           ],
           'rate',
           'comment',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerBandRate,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-band-rate']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Band Rate'),
       ],
       'export' => false,
       'columns' => $gridColumnBandRate
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerEvent->totalCount){
   $gridColumnEvent = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
                       [
               'attribute' => 'venue.name',
               'label' => 'Venue'
           ],
           'date',
           'start_time',
           'end_time',
           'name',
           'description:ntext',
           'cost',
           'is_charity',
           'twitter',
           'facebook',
           'website',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerEvent,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-event']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Event'),
       ],
       'export' => false,
       'columns' => $gridColumnEvent
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerUserEvent->totalCount){
   $gridColumnUserEvent = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
                       [
               'attribute' => 'event.name',
               'label' => 'Event'
           ],
           'is_going',
           'comment',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerUserEvent,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-event']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('User Event'),
       ],
       'export' => false,
       'columns' => $gridColumnUserEvent
   ]);
}
?>
   </div>
   
   <div class="row">
<?php
if($providerVenue->totalCount){
   $gridColumnVenue = [
       ['class' => 'yii\grid\SerialColumn'],
           ['attribute' => 'id', 'visible' => false],
                       'name',
           'address1',
           'address2',
           'city',
           'state',
           'zip',
           'description',
           'phone',
           'cost',
           'website',
           'twitter',
           'facebook',
   ];
   echo Gridview::widget([
       'dataProvider' => $providerVenue,
       'pjax' => true,
       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-venue']],
       'panel' => [
           'type' => GridView::TYPE_PRIMARY,
           'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Venue'),
       ],
       'export' => false,
       'columns' => $gridColumnVenue
   ]);
}
?>
   </div>
</div>