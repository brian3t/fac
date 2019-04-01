<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Settlement */

?>
<div class="settlement-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'settlement_id',
        [
            'attribute' => 'firstParty.name',
            'label' => 'First Party',
        ],
        [
            'attribute' => 'firstPartyEvent.id',
            'label' => 'First Party Event',
        ],
        'first_party_capacity',
        [
            'attribute' => 'secondPartyEvent.id',
            'label' => 'Second Party Event',
        ],
        'second_party_capacity',
        'second_party_date',
        [
            'attribute' => 'secondPartyArtist.username',
            'label' => 'Second Party Artist',
        ],
        [
            'attribute' => 'secondPartyVenue.name',
            'label' => 'Second Party Venue',
        ],
        'note',
        'artist_walkout_final',
        'ad_plan_final',
        'promoter_revenue_final',
        'ticket_sales_final',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>