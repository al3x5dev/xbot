<?php

namespace Al3x5\xBot\Entities;

/**
 * RefundedPayment Entity
 * @property string $currency;
 * @property int $total_amount;
 * @property string $invoice_payload;
 * @property string $telegram_payment_charge_id;
 * @property string $provider_payment_charge_id;
 */
class RefundedPayment extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
