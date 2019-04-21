<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

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
        'type',
        'name',
        'html:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

    <div class="row">
        <h4>Project<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnProject = [
        ['attribute' => 'id', 'visible' => false],
        'user_id',
        'name',
        'use_own_domain',
        'domain',
        'url',
        'country_code',
        'logo',
        'favicon',
        'type',
        'does_use_footer',
        'credit_text',
        'does_use_credit_text',
        'default_page_title',
        'default_meta_description',
        'default_meta_keywords',
        '404page_id',
        'thankspage_id',
    ];
    echo DetailView::widget([
        'model' => $model->project,
        'attributes' => $gridColumnProject    ]);
    ?>

</div>
