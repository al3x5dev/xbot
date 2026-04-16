<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommandScope Entity
 */
class BotCommandScope extends Entity
{
    
    public const TYPE_DEFAULT = 'default';
    public const TYPE_ALL_PRIVATE_CHATS = 'all_private_chats';
    public const TYPE_ALL_GROUP_CHATS = 'all_group_chats';
    public const TYPE_ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';
    public const TYPE_CHAT = 'chat';
    public const TYPE_CHAT_ADMINISTRATORS = 'chat_administrators';
    public const TYPE_CHAT_MEMBER = 'chat_member';

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

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_DEFAULT => new BotCommandScopeDefault($data),
            self::TYPE_ALL_PRIVATE_CHATS => new BotCommandScopeAllPrivateChats($data),
            self::TYPE_ALL_GROUP_CHATS => new BotCommandScopeAllGroupChats($data),
            self::TYPE_ALL_CHAT_ADMINISTRATORS => new BotCommandScopeAllChatAdministrators($data),
            self::TYPE_CHAT => new BotCommandScopeChat($data),
            self::TYPE_CHAT_ADMINISTRATORS => new BotCommandScopeChatAdministrators($data),
            self::TYPE_CHAT_MEMBER => new BotCommandScopeChatMember($data),
            default => throw new \InvalidArgumentException('Unknown BotCommandScope type: ' . ($data['type'] ?? 'null')),
        };
    }

}
