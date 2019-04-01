<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->users,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email:email',
        'registration_ip',
        'created_at',
        'updated_at',
        'first_name',
        'last_name',
        'job_title',
        'line_of_business',
        'union_memberships',
        'phone_number_type',
        'phone_number',
        'birthdate',
        'website_url:url',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'user'
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
