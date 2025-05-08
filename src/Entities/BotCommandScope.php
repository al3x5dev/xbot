<?php

namespace Al3x5\xBot\Entities;

/**
 * BotCommandScope Entity
 */
class BotCommandScope extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): BotCommandScopeDefault|BotCommandScopeAllPrivateChats|BotCommandScopeAllGroupChats|BotCommandScopeAllChatAdministrators|BotCommandScopeChat|BotCommandScopeChatAdministrators|BotCommandScopeChatMember
    {
        $type = $this->propertys['type'];

        return match ($type) {
            'default' => new BotCommandScopeDefault($this->propertys),
            'all_private_chats' => new BotCommandScopeAllPrivateChats($this->propertys),
            'all_group_chats' => new BotCommandScopeAllGroupChats($this->propertys),
            'all_chat_administrators' => new BotCommandScopeAllChatAdministrators($this->propertys),
            'chat' => new BotCommandScopeChat($this->propertys),
            'chat_administrators' => new BotCommandScopeChatAdministrators($this->propertys),
            'chat_member' => new BotCommandScopeChatMember($this->propertys)
        };
    }
}
