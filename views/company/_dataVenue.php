<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->venues,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'venue_type',
        'previous_name',
        'note',
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
        'full_stage_seating_capacity',
        'webpage',
        'facebook',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'venue'
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
