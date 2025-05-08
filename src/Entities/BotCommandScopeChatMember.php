<?php

namespace Al3x5\xBot\Entities;

/**
 * BotCommandScopeChatMember Entity
 * @property string $type;
 * @property int $chat_id;
 * @property int $user_id;
 */
class BotCommandScopeChatMember extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
