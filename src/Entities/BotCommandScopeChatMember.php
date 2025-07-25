<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScopeChatMember Entity
 * @property string $type
 * @property int $chat_id
 * @property int $user_id
 */
class BotCommandScopeChatMember extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
