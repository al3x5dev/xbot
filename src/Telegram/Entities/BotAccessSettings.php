<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotAccessSettings Entity
 * @property bool $is_access_restricted
 * @property User[] $added_users
 */
class BotAccessSettings extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'added_users' => [User::class],
        ];
    }
}
