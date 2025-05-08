<?php

namespace Al3x5\xBot\Entities;

/**
 * StoryArea Entity
 * @property StoryAreaPosition $position;
 * @property StoryAreaType $type;
 */
class StoryArea extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'position' => StoryAreaPosition::class,
            'type' => StoryAreaType::class,
        ];
    }
}
