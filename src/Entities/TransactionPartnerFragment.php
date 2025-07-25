<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartnerFragment Entity
 * @property string $type
 * @property RevenueWithdrawalState $withdrawal_state
 */
class TransactionPartnerFragment extends Entity
{
    protected function setEntities(): array
    {
        return [
            'withdrawal_state' => RevenueWithdrawalState::class,
        ];
    }
}
