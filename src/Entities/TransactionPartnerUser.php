<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartnerUser Entity
 * @property string $type
 * @property string $transaction_type
 * @property User $user
 * @property AffiliateInfo $affiliate
 * @property string $invoice_payload
 * @property int $subscription_period
 * @property PaidMedia[] $paid_media
 * @property string $paid_media_payload
 * @property Gift $gift
 * @property int $premium_subscription_duration
 */
class TransactionPartnerUser extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
            'affiliate' => AffiliateInfo::class,
            'paid_media' => [PaidMedia::class],
            'gift' => Gift::class,
        ];
    }
}
