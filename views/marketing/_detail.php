<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Marketing */

?>
<div class="marketing-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'offer.id',
            'label' => 'Offer',
        ],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        'graphic_artist',
        'newsprint',
        'internet',
        'street_team',
        'printing',
        'billboards',
        'spots',
        'admat',
        'postage',
        'others',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>