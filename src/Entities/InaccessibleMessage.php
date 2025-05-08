<?php

namespace Al3x5\xBot\Entities;

/**
 * InaccessibleMessage Entity
 * @property Chat $chat;
 * @property int $message_id;
 * @property int $date;
 */
class InaccessibleMessage extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
