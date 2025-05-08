<?php

namespace Al3x5\xBot\Entities;

/**
 * TransactionPartnerFragment Entity
 * @property string $type;
 * @property RevenueWithdrawalState $withdrawal_state;
 */
class TransactionPartnerFragment extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'withdrawal_state' => RevenueWithdrawalState::class,
        ];
    }
}
