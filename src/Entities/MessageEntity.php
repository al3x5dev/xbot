<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageEntity Entity
 * @property string $type
 * @property int $offset
 * @property int $length
 * @property string $url
 * @property User $user
 * @property string $language
 * @property string $custom_emoji_id
 */
class MessageEntity extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
