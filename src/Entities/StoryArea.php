<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryArea Entity
 * @property StoryAreaPosition $position
 * @property StoryAreaType $type
 */
class StoryArea extends Entity
{
    protected function setEntities(): array
    {
        return [
            'position' => StoryAreaPosition::class,
            'type' => StoryAreaType::class,
        ];
    }
}
