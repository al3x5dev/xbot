<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBackground Entity
 * @property BackgroundType $type
 */
class ChatBackground extends Entity
{
    protected function setEntities(): array
    {
        return [
            'type' => BackgroundType::class,
        ];
    }
}
