<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RevenueWithdrawalState Entity
 */
class RevenueWithdrawalState extends Entity
{
    
    public const TYPE_PENDING = 'pending';
    public const TYPE_SUCCEEDED = 'succeeded';
    public const TYPE_FAILED = 'failed';

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

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PENDING => new RevenueWithdrawalStatePending($data),
            self::TYPE_SUCCEEDED => new RevenueWithdrawalStateSucceeded($data),
            self::TYPE_FAILED => new RevenueWithdrawalStateFailed($data),
            default => throw new \InvalidArgumentException('Unknown RevenueWithdrawalState type: ' . ($data['type'] ?? 'null')),
        };
    }

}
