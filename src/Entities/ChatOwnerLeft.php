<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatOwnerLeft Entity
 * @property User $new_owner
 */
class ChatOwnerLeft extends Entity
{
    protected function setEntities(): array
    {
        return [
            'new_owner' => User::class,
        ];
    }
}
