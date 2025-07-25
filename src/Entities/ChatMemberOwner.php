<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMemberOwner Entity
 * @property string $status
 * @property User $user
 * @property bool $is_anonymous
 * @property string $custom_title
 */
class ChatMemberOwner extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
