<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InaccessibleMessage Entity
 * @property Chat $chat
 * @property int $message_id
 * @property int $date
 */
class InaccessibleMessage extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
