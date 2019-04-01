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
        'website',
        'headline',
        'industry',
        'phone_number',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'num_of_employee',
        'annual_revenue',
        'facebook_fans',
        'twitter_handle',
        'twitter_followers',
        'timezone',
        'description',
        'line_of_business',
        'general_email:email',
        'country',
        'work_phone',
        'fax',
        'webpage',
        'facebook',
        'linkedin_company_page',
        'yahoo',
        'twitter',
        'instagram',
        'google',
        'note',
        [
            'attribute' => 'belongCompany.name',
            'label' => 'Belong to Company',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>

    <div class="row">
        <?php
        if($providerCompany->totalCount){
            $gridColumnCompany = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
                'name',
                'website',
                'headline',
                'industry',
                'phone_number',
                'address1',
                'address2',
                'city',
                'state',
                'postal_code',
                'num_of_employee',
                'annual_revenue',
                'facebook_fans',
                'twitter_handle',
                'twitter_followers',
                'timezone',
                'description',
                'line_of_business',
                'general_email:email',
                'country',
                'work_phone',
                'fax',
                'webpage',
                'facebook',
                'linkedin_company_page',
                'yahoo',
                'twitter',
                'instagram',
                'google',
                'note',
            ];
            echo Gridview::widget([
                'dataProvider' => $providerCompany,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-company']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Company'),
                ],
                'columns' => $gridColumnCompany
            ]);
        }
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
            'job_title',
            'line_of_business',
            'union_memberships',
            'note',
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
            'work_phone',
            'mobile_phone',
            'home_phone',
            'address1',
            'address2',
            'city',
            'state',
            'zipcode',
            'country',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('User'),
        ],
        'columns' => $gridColumnUser
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
            'venue_type',
            'previous_name',
            'note',
            'ticket_rebate',
            'other_deal',
            'address1',
            'address2',
            'city',
            'state',
            'zipcode',
            'country',
            'timezone',
            'owner',
                        'general_info_email:email',
            'main_office_phone',
            'box_office_phone',
            'fax_phone',
            'other_phone',
                        'other_seating_capacity',
            'end_stage_seating_capacity',
            'full_stage_seating_capacity',
            'half_stage_seating_capacity',
            'in_the_round_seating_capacity',
            'other_seating_capacity_name',
            'other_seating_capacity_value',
            'webpage',
            'facebook',
            'yahoo',
            'linkedin',
            'twitter',
            'instagram',
            'google',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerVenue,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-venue']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Venue'),
        ],
        'columns' => $gridColumnVenue
    ]);
}
?>
    </div>
</div>