<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * AffiliateInfo Entity
 * @property User $affiliate_user
 * @property Chat $affiliate_chat
 * @property int $commission_per_mille
 * @property int $amount
 * @property int $nanostar_amount
 */
class AffiliateInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'affiliate_user' => User::class,
            'affiliate_chat' => Chat::class,
        ];
    }
}
