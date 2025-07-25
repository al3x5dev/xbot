<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatShared Entity
 * @property int $request_id
 * @property int $chat_id
 * @property string $title
 * @property string $username
 * @property PhotoSize[] $photo
 */
class ChatShared extends Entity
{
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
