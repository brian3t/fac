<?php

use vakorovin\datetimepicker\Datetimepicker;

//use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Offer */
/* @var $form app\views\widgets\ActiveForm */

phpQuery::newDocument();
$booked_by = $model->user ? $model->user->username : '';
/**
 * @param string $json
 * @return string text
 */
function array_2_text($json, $is_money = true)
{
    try {
        $json = json_decode($json);
    } catch (Exception $exception) {
        Yii::error("Cant decode json string $json");
        return '';
    }
    $wrapper = pq('<div>');
    $d = pq('<table>')->addClass('no_border');
    $i = 0;
    $tr = pq('<tr>')->append(pq('<td>'));
    foreach ($json as $k => $v) {
        if ($i % 3 == 0) {
            //wrap existing tr
            $d->append($tr);
            //create new tr
            $tr = pq('<tr>');
        }
        if ($is_money) {
            $v = money_format('$%(#8n', $v);
        }
        $k = ucwords(str_replace(["_"], " ", $k));
        $tr->append(pq('<td>')->html($k))->append(pq('<td>')->attr('align', 'right')->html($v));
        $i++;
    }
    $wrapper->append($d);
    return $wrapper->html();
}

function money($s)
{
    return money_format('$%(#8n', $s);
}

?>

<?php //= print_r($model->attributes);?>
<table cellspacing="0" cellpadding="6">
    <thead>
    <!--    <tr>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--        <th></th>-->
    <!--    </tr>-->
    </thead>
    <tbody>
    <tr>
        <td class="label">Booked By</td>
        <td colspan="2"><?= $booked_by ?></td>
        <td class="label">Offer Type</td>
        <td colspan="2"><?= $model->offer_type ?></td>
        <td class="label">Co Pro Promoter</td>
        <td colspan="2"><?= $model->coproPromoter ? $model->coproPromoter->name : '' ?></td>
    </tr>
    <tr>
        <td>Co Pro Venue</td>
        <td colspan="2"><?= $model->coproVenue ? $model->coproVenue->name : '' ?></td>
        <td>Event ID</td>
        <td colspan="2"><?= $model->event_id ?></td>
        <td>Show #</td>
        <td colspan="2"><?= $model->show_number ?> of <?= $model->show_total_num ?></td>
    </tr>
    <tr>
        <td>Agency</td>
        <td colspan="2"><?= $model->agency ? $model->agency->name : '' ?></td>
        <td>Agent</td>
        <td colspan="2"><?= $model->agent ? ($model->agent->first_name . ' ' . $model->agent->last_name) : '' ?></td>
        <td>Status</td>
        <td colspan="2"><?= $model->status ?></td>
    </tr>
    <tr>
        <td>Artist</td>
        <td colspan="2"><?= $model->artist ? ($model->artist->first_name . ' ' . $model->artist->last_name) : '' ?></td>
        <td>Venue</td>
        <td colspan="2"><?= $model->venue ? $model->venue->name : '' ?></td>
        <td>Show Date</td>
        <td><?= $model->is_tbd_date ? 'Is TBD' : '' ?></td>
        <td><?= $model->show_date??'' ?></td>
    </tr>
    <tr>
        <td>Show Type</td>
        <td colspan="2"><?= $model->show_type ?></td>
        <td>Door time</td>
        <td colspan="2"><?= $model->doors ?></td>
        <td>Showtime</td>
        <td colspan="2"><?= $model->showtime ?></td>
    </tr>
    <tr>
        <td>Notes</td>
        <td colspan="8" title="notes"></td>
    </tr>
    <tr>
        <td>L1 Gross Ticket</td>
        <td colspan="2"><?= $model->l1_gross_ticket ?></td>
        <td>L1 Kill</td>
        <td colspan="2"><?= $model->l1_kill ?></td>
        <td>L1 Price</td>
        <td colspan="2"><?= $model->l1_price ?></td>
    </tr>
    <tr>
        <td>L2 Gross Ticket</td>
        <td colspan="2"><?= $model->l2_gross_ticket ?></td>
        <td>L2 Kill</td>
        <td colspan="2"><?= $model->l2_kill ?></td>
        <td>L2 Price</td>
        <td colspan="2"><?= $model->l2_price ?></td>
    </tr>
    <tr>
        <td>L3 Gross Ticket</td>
        <td colspan="2"><?= $model->l3_gross_ticket ?></td>
        <td>L3 Kill</td>
        <td colspan="2"><?= $model->l3_kill ?></td>
        <td>L3 Price</td>
        <td colspan="2"><?= $model->l3_price ?></td>
    </tr>

    <tr>
        <td>L4 Gross Ticket</td>
        <td colspan="2"><?= $model->l4_gross_ticket ?></td>
        <td>L4 Kill</td>
        <td colspan="2"><?= $model->l4_kill ?></td>
        <td>L4 Price</td>
        <td colspan="2"><?= $model->l4_price ?></td>
    </tr>
    <tr>
        <td>L5 Gross Ticket</td>
        <td colspan="2"><?= $model->l5_gross_ticket ?></td>
        <td>L5 Kill</td>
        <td colspan="2"><?= $model->l5_kill ?></td>
        <td>L5 Price</td>
        <td colspan="2"><?= $model->l5_price ?></td>
    </tr>
    <tr>
        <td>On Sale Date</td>
        <td><?= $model->is_on_sale_date_tbd ? 'TBD' : '' ?></td>
        <td><?= $model->on_sale_date ?></td>
        <td>Ticketing Company</td>
        <td colspan="2"><?= $model->ticketingCompany ? $model->ticketingCompany->name : '' ?></td>
        <td>Seating Plan</td>
        <td colspan="2"><?= $model->seating_plan ?></td>
    </tr>
    <tr>
        <td>Tax</td>
        <td colspan="2"><?= $model->tax ?></td>
        <td>Tax Note</td>
        <td colspan="2"><?= $model->tax_note ?></td>
        <td>Tax Per Ticket</td>
        <td colspan="2"><?= $model->tax_per_ticket ?></td>
    </tr>
    <tr>
        <td>Facility Fee</td>
        <td colspan="2"><?= $model->facility_fee ?></td>
        <td colspan="3"></td>
        <td>Facility Fee Note</td>
        <td colspan="2"><?= $model->facility_fee_note ?></td>
    </tr>
    <tr>
        <td>Artist Guarantee</td>
        <td colspan="2"><?= $model->artist_guarantee ?></td>
        <td>Artist Deposit</td>
        <td colspan="2"><?= $model->artist_deposit ?></td>
        <td>Artist Offer Type</td>
        <td colspan="2"><?= $model->artist_offer_type ?></td>
    </tr>
    <tr>
        <td>Is Artist Production Buyout?</td>
        <td colspan="2"><?= $model->is_artist_production_buyout ? 'Yes' : 'No' ?></td>
        <td>Artist Split</td>
        <td colspan="2"><?= $model->artist_split ?></td>
        <td>Promoter Profit</td>
        <td colspan="2"><?= $model->promoter_profit ?></td>
    </tr>
    <tr>
        <td>Expense Application</td>
        <td colspan="2"><?= $model->expense_application ?></td>
        <td>Sponsorship</td>
        <td colspan="2"><?= $model->sponsorship ?></td>
        <td>Radius Clause</td>
        <td><?= $model->radius_clause ?></td>
        <td><?= $model->radius_clause_metric ?></td>
    </tr>
    <tr>
        <td>Pre Show Lockout</td>
        <td><?= $model->pre_show_lockout ?></td>
        <td><?= $model->pre_show_lockout ? $model->pre_show_lockout_unit : '' ?></td>
        <td></td>
        <td>Post Show Lockout</td>
        <td><?= $model->post_show_lockout ?></td>
        <td><?= $model->post_show_lockout ? $model->post_show_lockout_unit : '' ?></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>Artist Deal Note</td>
        <td colspan="8"><?= $model->artist_deal_note ?></td>
    </tr>
    <tr>
        <td>Support Artist 1</td>
        <td colspan="3"><?= $model->supportArtist1 ? ($model->supportArtist1->first_name . ' ' . $model->supportArtist1->last_name) : '' ?></td>
        <td>Support Artist 1 Total</td>
        <td><?= $model->support_artist_1_total ?></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>Support Artist 2</td>
        <td colspan="3"><?= $model->supportArtist2 ? ($model->supportArtist2->first_name . ' ' . $model->supportArtist2->last_name) : '' ?></td>
        <td>Support Artist 2 Total</td>
        <td><?= $model->support_artist_2_total ?></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td>Support Artist 3</td>
        <td colspan="3"><?= $model->supportArtist3 ? ($model->supportArtist3->first_name . ' ' . $model->supportArtist3->last_name) : '' ?></td>
        <td>Support Artist 3 Total</td>
        <td><?= $model->support_artist_3_total ?></td>
        <td colspan="3"></td>
    </tr>
    <tr class="row  no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr class="row  no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr style="border-bottom: none">
        <td colspan="9" class="bold">General Expense</td>
    </tr>
    <tr style="border-top: none;">
        <td colspan="9">    <?= array_2_text($model->general_expense) ?>        </td>
    </tr>
    <tr class="row ">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr style="border-bottom: none">
        <td colspan="9" class="bold">Production Expense</td>
    </tr>
    <tr style="border-top: none;">
        <td colspan="9">    <?= array_2_text($model->production_expense) ?>        </td>
    </tr>
    <tr>
        <td>Housenut Total</td>
        <td colspan="2"><?= $model->housenut_total ?></td>
        <td>Housenut Expense</td>
        <td colspan="5"><?= $model->housenut_expense ?></td>
    </tr>
    <tr class="row ">
        <td>General Expense Note</td>
        <td colspan="8"><?= $model->general_expense_note ?></td>
    </tr>
    <tr class="row no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr class="row  no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr class="row  no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr class="row  no_border">
        <td colspan="9">&nbsp;</td>
    </tr>

    <tr style="border-bottom: none">
        <td colspan="9" class="bold">Variable Expense</td>
    </tr>
    <tr style="border-top: none;">
        <td colspan="9">    <?= array_2_text($model->variable_expense, false) ?>        </td>
    </tr>
    <tr style="border-bottom: none">
        <td colspan="9" class="bold">Merchandise</td>
    </tr>
    <tr style="border-top: none">
        <td>Buyout Venue Sell</td>
        <td><?= money($model->merch_buyout_venue_sell) ?></td>
        <td>Buyout Artist Sell</td>
        <td><?= money($model->merch_buyout_artist_sell) ?></td>
        <td></td>
        <td>Artist split Venue sell</td>
        <td><?= money($model->merch_artist_split_venue_sell) ?></td>
        <td>Artist split Artist sell</td>
        <td><?= $model->merch_artist_split_artist_sell ?></td>
    </tr>
    <tr>
        <td>Venue Split Venue Sell</td>
        <td><?= money($model->merch_venue_split_venue_sell) ?></td>
        <td>Venue Split Artist Sell</td>
        <td><?= 100 - $model->merch_artist_split_artist_sell ?></td>
        <td></td>
        <td>Artist split Media venue sell</td>
        <td><?= money($model->merch_artist_split_media_venue_sell) ?></td>
        <td>Artist split Media artist sell</td>
        <td><?= $model->merch_artist_split_media_artist_sell ?></td>
    </tr>
    <tr>
        <td>Venue Split Media venue Sell</td>
        <td><?= money($model->merch_venue_split_media_venue_sell) ?></td>
        <td>Venue Split Media artist Sell</td>
        <td><?= 100 - $model->merch_artist_split_media_artist_sell ?></td>
        <td></td>
        <td>Note</td>
        <td colspan="3"><?= $model->merch_note ?></td>
    </tr>

    <tr class="row no_border">
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr style="border-bottom: none">
        <td colspan="9" class="bold">Comps and Kills</td>
    </tr>
    <tr style="border-top: none">
        <td>Artist Comps</td>
        <td><?= $model->artist_comp ?></td>
        <td colspan="7"><?= $model->artist_comp_note ?></td>
    </tr>
    <tr style="border-top: none">
        <td>Production Comps</td>
        <td><?= $model->production_comp ?></td>
        <td colspan="7"><?= $model->production_comp_note ?></td>
    </tr>
    <tr style="border-top: none">
        <td>Promotional Comps</td>
        <td><?= $model->promotional_comp ?></td>
        <td colspan="7"><?= $model->promotional_comp_note ?></td>
    </tr>
    <tr style="border-top: none">
        <td>House Comps</td>
        <td><?= $model->house_comp ?></td>
        <td colspan="7"><?= $model->house_comp_note ?></td>
    </tr>
    <tr style="border-top: none">
        <td>Kills</td>
        <td><?= $model->kill ?></td>
        <td colspan="7"><?= $model->kill_note ?></td>
    </tr>
    <tr style="border-top: none">
        <td colspan="2">Note</td>
        <td colspan="8"><?= $model->comp_kill_note ?></td>
    </tr>


    <!---->
    <!--        --><? //= $form->field($model, 'ascap_0_2500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 0 2500']) ?>
    <!--        --><? //= $form->field($model, 'ascap_2501_5000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 2501 5000']) ?>
    <!--        --><? //= $form->field($model, 'ascap_5001_10000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 5001 10000']) ?>
    <!--        --><? //= $form->field($model, 'ascap_10001_25000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 10001 25000']) ?>
    <!--        --><? //= $form->field($model, 'ascap_25001_x', ['options' => ['class' => 'form-group col-sm-2 ']])->textInput(['maxlength' => true, 'placeholder' => 'Ascap 25001 X']) ?>
    <!--    <td class="clearfix"></tr>-->
    <!---->
    <!--        --><? //= $form->field($model, 'bmi_0_2500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 0 2500']) ?>
    <!--        --><? //= $form->field($model, 'bmi_2501_3500', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 2501 3500']) ?>
    <!--        --><? //= $form->field($model, 'bmi_3501_5000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 3501 5000']) ?>
    <!--        --><? //= $form->field($model, 'bmi_5001_10000', ['options' => ['class' => 'form-group col-sm-2']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 5001 10000']) ?>
    <!--        --><? //= $form->field($model, 'bmi_10001_x', ['options' => ['class' => 'form-group col-sm-2 ']])->textInput(['maxlength' => true, 'placeholder' => 'Bmi 10001 X']) ?>
    <!--    <td class="clearfix"></tr>-->
    <!--    <td class="form-group">-->
    <!--        --><? //= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <!--        --><? //= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    <!--        </tr>-->
    </tbody>
</table>