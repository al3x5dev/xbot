<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMemberMember Entity
 * @property string $status;
 * @property User $user;
 * @property int $until_date;
 */
class ChatMemberMember extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
