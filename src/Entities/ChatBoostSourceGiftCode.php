<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSourceGiftCode Entity
 * @property string $source
 * @property User $user
 */
class ChatBoostSourceGiftCode extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
