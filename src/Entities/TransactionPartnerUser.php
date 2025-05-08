<?php

namespace Al3x5\xBot\Entities;

/**
 * TransactionPartnerUser Entity
 * @property string $type;
 * @property string $transaction_type;
 * @property User $user;
 * @property AffiliateInfo $affiliate;
 * @property string $invoice_payload;
 * @property int $subscription_period;
 * @property \PaidMedia[] $paid_media;
 * @property string $paid_media_payload;
 * @property Gift $gift;
 * @property int $premium_subscription_duration;
 */
class TransactionPartnerUser extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
            'affiliate' => AffiliateInfo::class,
            'gift' => Gift::class,
        ];
    }
}
