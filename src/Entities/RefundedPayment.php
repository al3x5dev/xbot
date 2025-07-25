<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RefundedPayment Entity
 * @property string $currency
 * @property int $total_amount
 * @property string $invoice_payload
 * @property string $telegram_payment_charge_id
 * @property string $provider_payment_charge_id
 */
class RefundedPayment extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
