<?php

namespace app\models;

use app\models\base\Offer as BaseOffer;

/**
 * This is the model class for table "offer".
 */
class Offer extends BaseOffer
{
    public static $order_by_col = 'event_id';

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels = array_replace_recursive($labels, [
            'user_id' => 'Booked By',
            'is_on_sale_date_tbd' => 'On Sale Date TBD',
            'copro_venue_id' => 'Copro Venue',
            'venue_id' => 'Venue',
            'is_tbd_date' => 'Show Date is TBD',
            'is_artist_production_buyout' => 'Artist Production Buyout',
            'support_artist_1_id' => 'Support Artist 1',
            'support_artist_2_id' => 'Support Artist 2',
            'support_artist_3_id' => 'Support Artist 3',
            'merch_note' => 'Merchandise Note',
        ]);
        return $labels;
    }

    public function beforeSave($insert)
    {
        if (empty($this->expense_application)) {
            $this->expense_application = '';
        }
        return parent::beforeSave($insert);
    }

    public function beforeValidate()
    {
        $this->event_id = strval($this->event_id);
        $s = $this->support_artist_1_total;
        if (strpos($s, ',') !== false) {
            $s = str_replace(',', '', $s);
        }
        $this->support_artist_1_total = $s;
        $s = $this->support_artist_2_total;
        if (strpos($s, ',') !== false) {
            $s = str_replace(',', '', $s);
        }
        $this->support_artist_2_total = $s;
        $s = $this->support_artist_3_total;
        if (strpos($s, ',') !== false) {
            $s = str_replace(',', '', $s);
        }
        $this->support_artist_3_total = $s;
        if ($this->is_artist_production_buyout === 'No') {
            $this->is_artist_production_buyout = 0;
        }
        if ($this->is_artist_production_buyout === 'Yes') {
            $this->is_artist_production_buyout = 1;
        }
        if (preg_match('/^\d{1,2}:\d\d\s[AP]M$/', $this->doors)) {
            $this->doors = (date_create_from_format('h:i A', $this->doors))->format('H:i:s');
        }
        if (preg_match('/^\d{1,2}:\d\d\s[AP]M$/', $this->showtime)) {
            $this->showtime = (date_create_from_format('h:i A', $this->showtime))->format('H:i:s');
        }
        if ($this->is_tbd_date === 'on') {
            $this->is_tbd_date = 1;
        } else {
            $this->is_tbd_date = 0;
        }
        if ($this->is_on_sale_date_tbd === 'on') {
            $this->is_on_sale_date_tbd = 1;
        } else {
            $this->is_on_sale_date_tbd = 0;
        }
        $this->l1_price = floatval($this->l1_price);
        $this->l2_price = floatval($this->l2_price);
        $this->l3_price = floatval($this->l3_price);
        $this->l4_price = floatval($this->l4_price);
        $this->l5_price = floatval($this->l5_price);
        $this->artist_guarantee = floatval($this->artist_guarantee);
        $this->housenut_total = floatval($this->housenut_total);
        $this->artist_comp_note = strval($this->artist_comp_note);
        $this->production_comp_note = strval($this->production_comp_note);
        $this->promotional_comp_note = strval($this->promotional_comp_note);
        $this->house_comp_note = strval($this->house_comp_note);
        $this->kill_note = strval($this->kill_note);

        return parent::beforeValidate();
    }
}
