<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatOwnerChanged Entity
 * @property User $new_owner
 */
class ChatOwnerChanged extends Entity
{
    protected function setEntities(): array
    {
        return [
            'new_owner' => User::class,
        ];
    }
}
