<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * OwnedGift Entity
 */
class OwnedGift extends Entity
{
    
    public const TYPE_REGULAR = 'regular';
    public const TYPE_UNIQUE = 'unique';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type){
            'regular' => new OwnedGiftRegular($this->properties),
            'unique' => new OwnedGiftUnique($this->properties),
            default => throw new \InvalidArgumentException('Unknown OwnedGift type: ' . $this->type),
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
            self::TYPE_REGULAR => new OwnedGiftRegular($data),
            self::TYPE_UNIQUE => new OwnedGiftUnique($data),
            default => throw new \InvalidArgumentException('Unknown OwnedGift type: ' . ($data['type'] ?? 'null')),
        };
    }

}
