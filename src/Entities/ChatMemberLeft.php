<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMemberLeft Entity
 * @property string $status;
 * @property User $user;
 */
class ChatMemberLeft extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
