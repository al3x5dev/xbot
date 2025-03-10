<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageEntity class
 * 
 * @property public string $type;
 * @property public int $offset;
 * @property public int $length;
 * @property public string $url;
 * @property public User $user;
 * @property public string $language;
 * @property public string $custom_emoji_id;
 */
class MessageEntity extends Base
{
    public function getEntities(): array
    {
        return [
            'user' => User::class
        ];
    }
}
