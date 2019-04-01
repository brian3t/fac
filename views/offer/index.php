<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Offer';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Offer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        'event_id',
        [
            'attribute' => 'user_id',
            'label' => 'User',
            'value' => function ($model) {
                return $model->user->username;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--user_id']
        ],
        'offer_type',
        [
            'attribute' => 'copro_promoter_id',
            'label' => 'Copro Promoter',
            'value' => function ($model) {
                return $model->coproPromoter->name??'';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--copro_promoter_id']
        ],
        [
            'attribute' => 'copro_venue_id',
            'label' => 'Copro Venue',
            'value' => function ($model) {
                return $model->coproVenue->name??'';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Venue', 'id' => 'grid--copro_venue_id']
        ],
//        'show_number',
//        'show_total_num',
        [
            'attribute' => 'agency_id',
            'label' => 'Agency',
            'value' => function ($model) {
                return is_object($model->agency) ? $model->agency->name : 'N/A';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--agency_id']
        ],
        [
            'attribute' => 'agent_id',
            'label' => 'Agent',
            'value' => function ($model) {
                return is_object($model->agent) ? $model->agent->username : 'N/A';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--agent_id']
        ],
        'status',
        'created_at',
        'updated_at',
        [
            'attribute' => 'artist_id',
            'label' => 'Artist',
            'value' => function ($model) {
                return is_object($model->artist) ? $model->artist->username : 'N/A';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--artist_id']
        ],
        [
            'attribute' => 'venue_id',
            'label' => 'Venue',
            'value' => function ($model) {
                return is_object($model->venue) ? $model->venue->name : 'N/A';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Venue::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Venue', 'id' => 'grid--venue_id']
        ],
        [
            'attribute' => 'belong_company_id',
            'label' => 'Belong Company',
            'value' => function($model){
                return $model->belongCompany?$model->belongCompany->name:'N/A';
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--belong_company_id']
        ],
//        'show_date',
//        'is_tbd_date',
//        'show_type',
//        'doors',
//        'showtime',
//        'notes',
//        'l1_gross_ticket',
//        'l1_kill',
//        'l1_price',
//        'l2_gross_ticket',
//        'l2_kill',
//        'l2_price',
//        'l3_gross_ticket',
//        'l3_kill',
//        'l3_price',
//        'l4_gross_ticket',
//        'l4_kill',
//        'l4_price',
//        'l5_gross_ticket',
//        'l5_kill',
//        'l5_price',
//        'on_sale_date',
//        'is_on_sale_date_tbd',
//        [
//                'attribute' => 'ticketing_company_id',
//                'label' => 'Ticketing Company',
//                'value' => function($model){
//                    return $model->ticketingCompany->name;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'id', 'name'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid--ticketing_company_id']
//            ],
//        'seating_plan',
//        'tax',
//        'tax_note',
//        'tax_per_ticket',
//        'facility_fee',
//        'facility_fee_note',
//        'artist_guarantee',
//        'artist_deposit',
//        'artist_offer_type',
//        'is_artist_production_buyout',
//        'artist_split',
//        'promoter_profit',
//        'expense_application',
//        'sponsorship',
//        'radius_clause',
//        'radius_clause_metric',
//        'pre_show_lockout',
//        'pre_show_lockout_unit',
//        'post_show_lockout',
//        'post_show_lockout_unit',
//        'artist_deal_note',
//        [
//                'attribute' => 'support_artist_1_id',
//                'label' => 'Support Artist 1',
//                'value' => function($model){
//                    return $model->supportArtist1->username;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--support_artist_1_id']
//            ],
//        'support_artist_1_total',
//        [
//                'attribute' => 'support_artist_2_id',
//                'label' => 'Support Artist 2',
//                'value' => function($model){
//                    return $model->supportArtist2->username;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--support_artist_2_id']
//            ],
//        'support_artist_2_total',
//        [
//                'attribute' => 'support_artist_3_id',
//                'label' => 'Support Artist 3',
//                'value' => function($model){
//                    return $model->supportArtist3->username;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--support_artist_3_id']
//            ],
//        'support_artist_3_total',
//        'general_expense',
//        'production_expense',
//        'housenut_total',
//        'housenut_expense',
//        'general_expense_note',
//        'variable_expense',
//        'merch_buyout_venue_sell',
//        'merch_buyout_artist_sell',
//        'merch_artist_split_venue_sell',
//        'merch_artist_split_artist_sell',
//        'merch_artist_split_media_venue_sell',
//        'merch_artist_split_media_artist_sell',
//        'merch_note',
//        'artist_comp',
//        'artist_comp_note',
//        'production_comp',
//        'production_comp_note',
//        'promotional_comp',
//        'promotional_comp_note',
//        'house_comp',
//        'house_comp_note',
//        'kill',
//        'kill_note',
//        'comp_kill_note',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-offer']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]),
        ],
    ]); ?>

</div>
