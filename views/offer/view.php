<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Offer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Offer' . ' ' . Html::encode($this->title) ?></h2>
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
            [
                'attribute' => 'user.username',
                'label' => 'User',
            ],
            'offer_type',
            [
                'attribute' => 'coproPromoter.name',
                'label' => 'Copro Promoter',
            ],
            [
                'attribute' => 'coproVenue.name',
                'label' => 'Copro Venue',
            ],
            'event_id',
            'show_number',
            'show_total_num',
            [
                'attribute' => 'agency.name',
                'label' => 'Agency',
            ],
            [
                'attribute' => 'agent.username',
                'label' => 'Agent',
            ],
            'status',
            'created_at',
            'updated_at',
            [
                'attribute' => 'artist.username',
                'label' => 'Artist',
            ],
            [
                'attribute' => 'venue.name',
                'label' => 'Venue',
            ],
            'show_date',
            'is_tbd_date',
            'show_type',
            [
                'attribute' => 'doors',
                'format' => ['date', 'php:H:i']
            ],
            'showtime',
            'notes',
            'l1_gross_ticket',
            'l1_kill',
            'l1_price',
            'l2_gross_ticket',
            'l2_kill',
            'l2_price',
            'l3_gross_ticket',
            'l3_kill',
            'l3_price',
            'l4_gross_ticket',
            'l4_kill',
            'l4_price',
            'l5_gross_ticket',
            'l5_kill',
            'l5_price',
            'on_sale_date',
            'is_on_sale_date_tbd',
            [
                'attribute' => 'ticketingCompany.name',
                'label' => 'Ticketing Company',
            ],
            'seating_plan',
            'tax',
            'tax_note',
            'tax_per_ticket',
            'facility_fee',
            'facility_fee_note',
            'artist_guarantee',
            'artist_deposit',
            'artist_offer_type',
            'is_artist_production_buyout',
            'artist_split',
            'promoter_profit',
            'expense_application',
            'sponsorship',
            'radius_clause',
            'radius_clause_metric',
            'pre_show_lockout',
            'pre_show_lockout_unit',
            'post_show_lockout',
            'post_show_lockout_unit',
            'artist_deal_note',
            [
                'attribute' => 'supportArtist1.username',
                'label' => 'Support Artist 1',
            ],
            'support_artist_1_total',
            [
                'attribute' => 'supportArtist2.username',
                'label' => 'Support Artist 2',
            ],
            'support_artist_2_total',
            [
                'attribute' => 'supportArtist3.username',
                'label' => 'Support Artist 3',
            ],
            'support_artist_3_total',
            'general_expense',
            'production_expense',
            'housenut_total',
            'housenut_expense',
            'general_expense_note',
            'variable_expense',
            'merch_buyout_venue_sell',
            'merch_buyout_artist_sell',
            'merch_artist_split_venue_sell',
            'merch_artist_split_artist_sell',
            'merch_venue_split_venue_sell',
            'merch_artist_split_media_venue_sell',
            'merch_artist_split_media_artist_sell',
            'merch_venue_split_media_venue_sell',
            'merch_note',
            'artist_comp',
            'artist_comp_note',
            'production_comp',
            'production_comp_note',
            'promotional_comp',
            'promotional_comp_note',
            'house_comp',
            'house_comp_note',
            'kill',
            'kill_note',
            'comp_kill_note',
            'ascap_0_2500',
            'ascap_2501_5000',
            'ascap_5001_10000',
            'ascap_10001_25000',
            'ascap_25001_x',
            'bmi_0_2500',
            'bmi_2501_3500',
            'bmi_3501_5000',
            'bmi_5001_10000',
            'bmi_10001_x',
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