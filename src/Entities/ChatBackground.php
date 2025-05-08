<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBackground Entity
 * @property BackgroundType $type;
 */
class ChatBackground extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'type' => BackgroundType::class,
        ];
    }
}
