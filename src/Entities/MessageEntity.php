<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageEntity Entity
 * @property string $type;
 * @property int $offset;
 * @property int $length;
 * @property string $url;
 * @property User $user;
 * @property string $language;
 * @property string $custom_emoji_id;
 */
class MessageEntity extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
