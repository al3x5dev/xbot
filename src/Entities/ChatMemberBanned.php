<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMemberBanned Entity
 * @property string $status
 * @property User $user
 * @property int $until_date
 */
class ChatMemberBanned extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
