<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOrigin Entity
 */
class MessageOrigin extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        return match($this->type) {
            'user' => new MessageOriginUser($this->properties),
            'hidden_user' => new MessageOriginHiddenUser($this->properties),
            'chat' => new MessageOriginChat($this->properties),
            'channel' => new MessageOriginChannel($this->properties),
            default => throw new \InvalidArgumentException('Unknown MessageOrigin type: ' . $this->type),
        };
    }
}
