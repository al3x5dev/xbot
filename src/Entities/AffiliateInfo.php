<?php

namespace Al3x5\xBot\Entities;

/**
 * AffiliateInfo Entity
 * @property User $affiliate_user;
 * @property Chat $affiliate_chat;
 * @property int $commission_per_mille;
 * @property int $amount;
 * @property int $nanostar_amount;
 */
class AffiliateInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'affiliate_user' => User::class,
            'affiliate_chat' => Chat::class,
        ];
    }
}
