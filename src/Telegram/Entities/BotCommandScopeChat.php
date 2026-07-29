<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScopeChat Entity
 * @property string $type
 * @property int|string $chat_id
 */
class BotCommandScopeChat extends BotCommandScope
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
