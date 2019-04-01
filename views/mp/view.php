<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Mp'.' '. Html::encode($this->title) ?></h2>
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
        ['attribute' => 'id', 'hidden' => true],
        'name',
        'end_point_name',
        'currency_code',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerOrder->totalCount){
    $gridColumnOrder = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'mp.name',
                'label' => 'Mp'
        ],
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
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrder,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order'.' '. $this->title),
        ],
        'columns' => $gridColumnOrder
    ]);
}
?>
    </div>
</div>