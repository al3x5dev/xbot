<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScopeChat Entity
 * @property string $type
 * @property int $chat_id
 */
class BotCommandScopeChat extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
