<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Settlement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Settlement', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settlement-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Settlement' . ' ' . Html::encode($this->title) ?></h2>
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
            ['attribute' => 'id', 'visible' => false],
            'settlement_id',
            [
                'attribute' => 'firstParty.name',
                'label' => 'First Party',
            ],
            [
                'attribute' => 'firstPartyEvent.id',
                'label' => 'First Party Event',
                'value' => $model->firstPartyEvent?$model->firstPartyEvent->event_id:'N/A'
            ],
            'first_party_capacity',
            [
                'attribute' => 'secondPartyEvent.id',
                'label' => 'Second Party Event',
                'value' => $model->secondPartyEvent?$model->secondPartyEvent->event_id:'N/A'
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
            [
                'attribute' => 'belongCompany.name',
                'label' => 'Belong Company',
            ],
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
</div>
