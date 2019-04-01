<?php
/**
 * Created by IntelliJ IDEA.
 * User: tri
 * Date: 7/26/16
 * Time: 10:02 AM
 */

namespace app\models\rest;


class OrderItem extends \app\models\OrderItem
{
    public function fields()
    {
        return ['channel_item_refnum' => 'mp_item_id', 'sku' => function () {
            return $this->getRop_sku();
        }, 'sku_description', 'quantity', 'item_type',
            'currency_values' => function () {
                return ['discount_amt' => $this->getDiscount_amt(), 'discount_pct' => $this->getDiscount_pct(), 'recycling_amt' => $this->getRecycling_amt(),
                    'ship_amt' => $this->getShip_amt(), 'shiptax_amt' => $this->getShiptax_amt(), 'unit_price' => $this->getUnit_price(),
                    'unit_tax' => $this->getUnit_tax(), 'unit_tax_pct' => $this->getUnit_tax_pct(), 'vat_pct' => $this->getVat_pct()];
            }];
    }
}