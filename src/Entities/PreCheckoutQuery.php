<?php

namespace Al3x5\xBot\Entities;

/**
 * PreCheckoutQuery Entity
 * @property string $id;
 * @property User $from;
 * @property string $currency;
 * @property int $total_amount;
 * @property string $invoice_payload;
 * @property string $shipping_option_id;
 * @property OrderInfo $order_info;
 */
class PreCheckoutQuery extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'order_info' => OrderInfo::class,
        ];
    }
}
