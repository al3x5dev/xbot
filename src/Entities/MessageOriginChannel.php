<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOriginChannel Entity
 * @property string $type
 * @property int $date
 * @property Chat $chat
 * @property int $message_id
 * @property string $author_signature
 */
class MessageOriginChannel extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
