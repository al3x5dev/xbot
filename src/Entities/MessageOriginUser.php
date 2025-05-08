<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageOriginUser Entity
 * @property string $type;
 * @property int $date;
 * @property User $sender_user;
 */
class MessageOriginUser extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sender_user' => User::class,
        ];
    }
}
