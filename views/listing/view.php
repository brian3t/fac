<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Listing */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Listing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listing-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Listing'.' '. Html::encode($this->title) ?></h2>
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
        'address1',
        'address2',
        'country_code',
        'city',
        'district',
        'area',
        'property_type',
        'developer_id',
        'postal_code',
        'total_unit',
        'tenure',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerMicrosite->totalCount){
    $gridColumnMicrosite = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'project.name',
                'label' => 'Project'
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
</div>
