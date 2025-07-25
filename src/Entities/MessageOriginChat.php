<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOriginChat Entity
 * @property string $type
 * @property int $date
 * @property Chat $sender_chat
 * @property string $author_signature
 */
class MessageOriginChat extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sender_chat' => Chat::class,
        ];
    }
}
