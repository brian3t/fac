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
            [
                'attribute' => 'group.name',
                'label' => 'Group',
            ],
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
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>

    <div class="row">
        <?php
        if($providerProject->totalCount){
            $gridColumnProject = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
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
            echo Gridview::widget([
                'dataProvider' => $providerProject,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-project']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Project'),
                ],
                'export' => false,
                'columns' => $gridColumnProject
            ]);
        }
        ?>

    </div>
    <div class="row">
        <h4>UserGroup<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php
    $gridColumnUserGroup = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'logo',
    ];
    echo DetailView::widget([
        'model' => $model->group,
        'attributes' => $gridColumnUserGroup    ]);
    ?>
</div>
