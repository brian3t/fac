<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Customer'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'first_name',
        'last_name',
        'company',
        'email_address:email',
        'phone_number',
        'mp_customer_id',
        'created_at',
        'updated_at',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
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
        'shipcode',
        'ip_address',
        'status',
        'note',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrder,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Order'.' '. $this->title),
        ],
        'columns' => $gridColumnOrder
    ]);
?>
    </div>
</div>
