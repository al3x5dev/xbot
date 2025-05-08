<?php

namespace Al3x5\xBot\Entities;

/**
 * SuccessfulPayment Entity
 * @property string $currency;
 * @property int $total_amount;
 * @property string $invoice_payload;
 * @property int $subscription_expiration_date;
 * @property bool $is_recurring;
 * @property bool $is_first_recurring;
 * @property string $shipping_option_id;
 * @property OrderInfo $order_info;
 * @property string $telegram_payment_charge_id;
 * @property string $provider_payment_charge_id;
 */
class SuccessfulPayment extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'order_info' => OrderInfo::class,
        ];
    }
}
