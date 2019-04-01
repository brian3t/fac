<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->username) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => true],
        'username',
        [
            'attribute' => 'company.name',
            'label' => 'Company',
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
</div>