<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->orders,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'channel_refnum',
        'retailops_order_id',
        'last_mp_updated',
        'last_rop_pull',
        'force_rop_resend',
        'count_rop_pull',
        'channel_date_created',
        'shipping_amt',
        'tax_amt',
        'first_name',
        'last_name',
        'company',
        'email:email',
        'address1',
        'address2',
        'city',
        'state_match',
        'country_match',
        'postal_code',
        'gift_message',
        'phone',
        'ship_first_name',
        'ship_last_name',
        'ship_company',
        'ship_address1',
        'ship_address2',
        'ship_city',
        'ship_state_match',
        'ship_country_match',
        'ship_postal_code',
        'ship_phone',
        'pay_type',
        'pay_transaction_id',
        'comments:ntext',
        'product_total',
        [
                'attribute' => 'customer.id',
                'label' => 'Customer'
        ],
        'discount_amt',
        'grand_total',
        'ship_service_code',
        'ip_address',
        'status',
        'attributes',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'order'
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
