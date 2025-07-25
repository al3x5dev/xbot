<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PreCheckoutQuery Entity
 * @property string $id
 * @property User $from
 * @property string $currency
 * @property int $total_amount
 * @property string $invoice_payload
 * @property string $shipping_option_id
 * @property OrderInfo $order_info
 */
class PreCheckoutQuery extends Entity
{
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'order_info' => OrderInfo::class,
        ];
    }
}
