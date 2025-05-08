<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageOriginChannel Entity
 * @property string $type;
 * @property int $date;
 * @property Chat $chat;
 * @property int $message_id;
 * @property string $author_signature;
 */
class MessageOriginChannel extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
