<?php

namespace Al3x5\xBot\Entities;

/**
 * RevenueWithdrawalState Entity
 */
class RevenueWithdrawalState extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): RevenueWithdrawalStatePending|RevenueWithdrawalStateSucceeded|RevenueWithdrawalStateFailed
    {
        return match ($this->type) {
            'pending' => new RevenueWithdrawalStatePending($this->propertys),
            'succeeded' => new RevenueWithdrawalStateSucceeded($this->propertys),
            'failed' => new RevenueWithdrawalStateFailed($this->propertys),
        };
    }
}
