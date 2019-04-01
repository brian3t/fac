<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->events,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'user.username',
                'label' => 'User'
            ],
        'date',
        'start_time',
        'end_time',
        [
            'class' => 'usv\yii2helper\grid\EditColumn',
        ],
        'description:ntext',
        'cost',
        'is_charity',
        'twitter',
        'facebook',
        'website',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'event'
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
