<?php

namespace Al3x5\xBot\Telegram\Entities;

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
 * @property int $unix_time
 * @property string $date_time_format
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
