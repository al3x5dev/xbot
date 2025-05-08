<?php

namespace Al3x5\xBot\Entities;

/**
 * Story Entity
 * @property Chat $chat;
 * @property int $id;
 */
class Story extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
