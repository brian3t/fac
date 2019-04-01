<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->offers,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'user.username',
                'label' => 'User'
            ],
        'offer_type',
                [
                'attribute' => 'coproVenue.name',
                'label' => 'Copro Venue'
            ],
        'event_id',
        'show_number',
        'show_total_num',
                [
                'attribute' => 'agent.username',
                'label' => 'Agent'
            ],
        'status',
        [
                'attribute' => 'artist.username',
                'label' => 'Artist'
            ],
        [
                'attribute' => 'venue.name',
                'label' => 'Venue'
            ],
        'show_date',
        'is_tbd_date',
        'show_type',
        'doors',
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
                'label' => 'Support Artist 1'
            ],
        'support_artist_1_total',
        [
                'attribute' => 'supportArtist2.username',
                'label' => 'Support Artist 2'
            ],
        'support_artist_2_total',
        [
                'attribute' => 'supportArtist3.username',
                'label' => 'Support Artist 3'
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
        'merch_artist_split_media_venue_sell',
        'merch_artist_split_media_artist_sell',
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'offer'
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
