<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatShared Entity
 * @property int $request_id;
 * @property int $chat_id;
 * @property string $title;
 * @property string $username;
 * @property \PhotoSize[] $photo;
 */
class ChatShared extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
