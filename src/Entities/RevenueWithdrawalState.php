<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RevenueWithdrawalState Entity
 */
class RevenueWithdrawalState extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'pending' => new RevenueWithdrawalStatePending($this->properties),
            'succeeded' => new RevenueWithdrawalStateSucceeded($this->properties),
            'failed' => new RevenueWithdrawalStateFailed($this->properties),
            default => throw new \InvalidArgumentException('Unknown RevenueWithdrawalState type: ' . $this->type),
        };
    }
}
