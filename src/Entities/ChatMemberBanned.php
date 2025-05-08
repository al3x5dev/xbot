<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMemberBanned Entity
 * @property string $status;
 * @property User $user;
 * @property int $until_date;
 */
class ChatMemberBanned extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
