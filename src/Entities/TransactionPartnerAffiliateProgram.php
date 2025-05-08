<?php

namespace Al3x5\xBot\Entities;

/**
 * TransactionPartnerAffiliateProgram Entity
 * @property string $type;
 * @property User $sponsor_user;
 * @property int $commission_per_mille;
 */
class TransactionPartnerAffiliateProgram extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sponsor_user' => User::class,
        ];
    }
}
