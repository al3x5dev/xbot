<?php

namespace Al3x5\xBot\Entities;

/**
 * SwitchInlineQueryChosenChat Entity
 * @property string $query;
 * @property bool $allow_user_chats;
 * @property bool $allow_bot_chats;
 * @property bool $allow_group_chats;
 * @property bool $allow_channel_chats;
 */
class SwitchInlineQueryChosenChat extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
