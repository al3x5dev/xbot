<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Story Entity
 * @property Chat $chat
 * @property int $id
 */
class Story extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
