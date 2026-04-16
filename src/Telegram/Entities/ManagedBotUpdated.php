<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ManagedBotUpdated Entity
 * @property User $user
 * @property User $bot
 */
class ManagedBotUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
            'bot' => User::class,
        ];
    }
}
