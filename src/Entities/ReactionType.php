<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReactionType Entity
 */
class ReactionType extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'emoji' => new ReactionTypeEmoji($this->properties),
            'custom_emoji' => new ReactionTypeCustomEmoji($this->properties),
            'paid' => new ReactionTypePaid($this->properties),
            default => throw new \InvalidArgumentException('Unknown ReactionType type: ' . $this->type),
        };
    }
}
