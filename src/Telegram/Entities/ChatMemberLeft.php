<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMemberLeft Entity
 * @property string $status
 * @property User $user
 */
class ChatMemberLeft extends ChatMember
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
