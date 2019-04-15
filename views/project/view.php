<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'name',
        'url:url',
        'country_code',
        'logo',
        'favicon',
        'type',
        'biz_contact_name',
        'does_enable_phone_display',
        'does_enable_email_display:email',
        'phone',
        'email:email',
        'sms',
        'whatsapp',
        'wechatid',
        'wechat_image',
        'phone2',
        'email2:email',
        'phone3',
        'email3:email',
        'footer',
        'does_use_footer',
        'credit_text',
        'does_use_credit_text',
        'default_page_title',
        'default_meta_description',
        'default_meta_keywords',
        '404page_id',
        'thankspage_id',
        'g_search_site_verification',
        'g_global_site_tags',
        'g_remarketing_tag',
        'facebook_pixel_code',
        'does_enable_custom_robots',
        'custom_robots',
        'facebook',
        'youtube',
        'instagram',
        'linkedin',
        'twitter',
        'googleplus',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerGallery->totalCount){
    $gridColumnGallery = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'name',
            'file_path',
            [
                'attribute' => 'microsite.id',
                'label' => 'Microsite'
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerGallery,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gallery']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gallery'),
        ],
        'export' => false,
        'columns' => $gridColumnGallery
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerMicrosite->totalCount){
    $gridColumnMicrosite = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'listing.name',
                'label' => 'Listing'
            ],
            'is_using_project_domain',
            'subdomain',
            'domain',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMicrosite,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-microsite']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Microsite'),
        ],
        'export' => false,
        'columns' => $gridColumnMicrosite
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerPage->totalCount){
    $gridColumnPage = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'microsite.id',
                'label' => 'Microsite'
            ],
            'name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPage,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-page']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Page'),
        ],
        'export' => false,
        'columns' => $gridColumnPage
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'group_id',
        'username',
        'email:email',
        'password_hash',
        'auth_key',
        'confirmed_at',
        'unconfirmed_email',
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
        'website_url',
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
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
