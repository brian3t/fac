<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tracking */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tracking', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracking-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Tracking'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'order.name',
                'label' => 'Rop Order'
        ],
        'sku',
        'tracking_number',
        'tracking_carrier',
        'ship_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
