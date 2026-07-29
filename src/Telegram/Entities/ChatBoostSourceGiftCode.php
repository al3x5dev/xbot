<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSourceGiftCode Entity
 * @property string $source
 * @property User $user
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
