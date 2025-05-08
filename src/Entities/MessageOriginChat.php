<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageOriginChat Entity
 * @property string $type;
 * @property int $date;
 * @property Chat $sender_chat;
 * @property string $author_signature;
 */
class MessageOriginChat extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sender_chat' => Chat::class,
        ];
    }
}
