<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ManagedBotCreated Entity
 * @property User $bot
 */
class ManagedBotCreated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'bot' => User::class,
        ];
    }
}
