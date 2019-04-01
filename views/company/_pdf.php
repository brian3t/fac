<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Company'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
                'name',
        'website',
        'headline',
        'industry',
        'phone_number',
        'city',
        'state',
        'postal_code',
        'num_of_employee',
        'annual_revenue',
        'facebook_fans',
        'twitter_handle',
        'twitter_followers',
        'linkedin_company_page',
        'timezone',
        'description',
        'line_of_business',
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
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('User'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUser
    ]);
}
?>
    </div>
</div>
