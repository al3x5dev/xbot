<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScope Entity
 */
class BotCommandScope extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'default' => new BotCommandScopeDefault($this->properties),
            'all_private_chats' => new BotCommandScopeAllPrivateChats($this->properties),
            'all_group_chats' => new BotCommandScopeAllGroupChats($this->properties),
            'all_chat_administrators' => new BotCommandScopeAllChatAdministrators($this->properties),
            'chat' => new BotCommandScopeChat($this->properties),
            'chat_administrators' => new BotCommandScopeChatAdministrators($this->properties),
            'chat_member' => new BotCommandScopeChatMember($this->properties),
            default => throw new \InvalidArgumentException('Unknown BotCommandScope type: ' . $this->type),
        };
    }
}
