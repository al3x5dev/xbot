<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScopeChatAdministrators Entity
 * @property string $type
 * @property int|string $chat_id
 */
class BotCommandScopeChatAdministrators extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat_id' => int|string::class,
        ];
    }
}
