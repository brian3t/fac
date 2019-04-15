<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Agent Team', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Agent Team'.' '. Html::encode($this->title) ?></h2>
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
        'name',
        'logo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerUser->totalCount){
    $gridColumnUser = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'username',
            'email:email',
            'password_hash',
            'auth_key',
            'confirmed_at',
            'unconfirmed_email:email',
            'blocked_at',
            'registration_ip',
            'flags',
            'first_name',
            'last_name',
            'note',
            'phone_number_type',
            'phone_number',
            'birthdate',
            'birth_month',
            'birth_year',
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
            'last_login_at',
            'role',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('User'),
        ],
        'export' => false,
        'columns' => $gridColumnUser
    ]);
}
?>

    </div>
</div>
