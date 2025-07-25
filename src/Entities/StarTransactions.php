<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StarTransactions Entity
 * @property StarTransaction[] $transactions
 */
class StarTransactions extends Entity
{
    protected function setEntities(): array
    {
        return [
            'transactions' => [StarTransaction::class],
        ];
    }
}
