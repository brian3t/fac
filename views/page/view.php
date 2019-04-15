<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Page', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Page'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'project.name',
            'label' => 'Project',
        ],
        [
            'attribute' => 'microsite.id',
            'label' => 'Microsite',
        ],
        'name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerMicrositeMenu->totalCount){
    $gridColumnMicrositeMenu = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'name',
            'order',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMicrositeMenu,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-microsite-menu']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Microsite Menu'),
        ],
        'export' => false,
        'columns' => $gridColumnMicrositeMenu
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Microsite<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnMicrosite = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'project.name',
            'label' => 'Project',
        ],
        'listing_id',
        'is_using_project_domain',
        'subdomain',
        'domain',
    ];
    echo DetailView::widget([
        'model' => $model->microsite,
        'attributes' => $gridColumnMicrosite    ]);
    ?>
    <div class="row">
        <h4>Project<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnProject = [
        ['attribute' => 'id', 'visible' => false],
        'user_id',
        'name',
        'url',
        'country_code',
        'logo',
        'favicon',
        'type',
        'biz_contact_name',
        'does_enable_phone_display',
        'does_enable_email_display',
        'phone',
        'email',
        'sms',
        'whatsapp',
        'wechatid',
        'wechat_image',
        'phone2',
        'email2',
        'phone3',
        'email3',
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
        'model' => $model->project,
        'attributes' => $gridColumnProject    ]);
    ?>
    
    <div class="row">
<?php
if($providerProjectMenu->totalCount){
    $gridColumnProjectMenu = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProjectMenu,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-project-menu']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Project Menu'),
        ],
        'export' => false,
        'columns' => $gridColumnProjectMenu
    ]);
}
?>

    </div>
</div>
