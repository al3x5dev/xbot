<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SwitchInlineQueryChosenChat Entity
 * @property string $query
 * @property bool $allow_user_chats
 * @property bool $allow_bot_chats
 * @property bool $allow_group_chats
 * @property bool $allow_channel_chats
 */
class SwitchInlineQueryChosenChat extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
