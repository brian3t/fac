<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->mkTelevisions,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'company.name',
                'label' => 'Company'
            ],
        'format',
        'contact',
        'phone_email:email',
        'impressions',
        'promo_tickets',
        'promo_value',
        'promo_run_from',
        'promo_run_to',
        'paid_run_from',
        'paid_run_to',
        'qty',
        'dg_code',
        'gross',
        'net',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'mk-television'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
