<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageEntity class
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
