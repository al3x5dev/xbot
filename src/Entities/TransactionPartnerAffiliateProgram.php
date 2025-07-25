<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartnerAffiliateProgram Entity
 * @property string $type
 * @property User $sponsor_user
 * @property int $commission_per_mille
 */
class TransactionPartnerAffiliateProgram extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sponsor_user' => User::class,
        ];
    }
}
