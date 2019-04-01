<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\base\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
                'username',
        [
                'attribute' => 'company.name',
                'label' => 'Company'
            ],
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
        'job_title',
        'line_of_business',
        'union_memberships',
        'phone_number_type',
        'phone_number',
        'birthdate',
        'website_url:url',
        'twitter_id',
        'facebook_id',
        'instagram_id',
        'google_id',
        'yahoo_id',
        'linkedin_id',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerSocialAccount->totalCount){
    $gridColumnSocialAccount = [
        ['class' => 'yii\grid\SerialColumn'],
                        'provider',
        'client_id',
        'data:ntext',
        'code',
        'created_at',
        'email:email',
        'username',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSocialAccount,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Social Account'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnSocialAccount
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerToken->totalCount){
    $gridColumnToken = [
        ['class' => 'yii\grid\SerialColumn'],
                'code',
        'created_at',
        'type',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerToken,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Token'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnToken
    ]);
}
?>
    </div>
</div>
