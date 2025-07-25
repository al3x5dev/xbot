<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSource Entity
 */
class ChatBoostSource extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        return match($this->source) {
            'premium' => new ChatBoostSourcePremium($this->properties),
            'gift_code' => new ChatBoostSourceGiftCode($this->properties),
            'giveaway' => new ChatBoostSourceGiveaway($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatBoostSource source: ' . $this->source),
        };
    }
}
