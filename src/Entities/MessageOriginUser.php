<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOriginUser Entity
 * @property string $type
 * @property int $date
 * @property User $sender_user
 */
class MessageOriginUser extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sender_user' => User::class,
        ];
    }
}
