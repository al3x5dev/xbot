<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * OwnedGift Entity
 */
class OwnedGift extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        return match($this->type){
            'regular' => new OwnedGiftRegular($this->properties),
            'unique' => new OwnedGiftUnique($this->properties),
            default => throw new \InvalidArgumentException('Unknown OwnedGift type: ' . $this->type),
        };
    }
}
