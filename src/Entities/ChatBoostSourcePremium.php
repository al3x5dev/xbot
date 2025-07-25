<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSourcePremium Entity
 * @property string $source
 * @property User $user
 */
class ChatBoostSourcePremium extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
