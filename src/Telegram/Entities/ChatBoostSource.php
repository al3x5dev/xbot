<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSource Entity
 */
class ChatBoostSource extends Entity
{
    
    public const SOURCE_PREMIUM = 'premium';
    public const SOURCE_GIFT_CODE = 'gift_code';
    public const SOURCE_GIVEAWAY = 'giveaway';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->source) {
            'premium' => new ChatBoostSourcePremium($this->properties),
            'gift_code' => new ChatBoostSourceGiftCode($this->properties),
            'giveaway' => new ChatBoostSourceGiveaway($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatBoostSource source: ' . $this->source),
        };
    }

    /**
     * Factory: creates the correct subclass based on source
     *
     * @param array $data Must contain 'source' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['source'] ?? null) {
            self::SOURCE_PREMIUM => new ChatBoostSourcePremium($data),
            self::SOURCE_GIFT_CODE => new ChatBoostSourceGiftCode($data),
            self::SOURCE_GIVEAWAY => new ChatBoostSourceGiveaway($data),
            default => throw new \InvalidArgumentException('Unknown ChatBoostSource source: ' . ($data['source'] ?? 'null')),
        };
    }

}
