<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOrigin Entity
 */
class MessageOrigin extends Entity
{
    
    public const TYPE_USER = 'user';
    public const TYPE_HIDDEN_USER = 'hidden_user';
    public const TYPE_CHAT = 'chat';
    public const TYPE_CHANNEL = 'channel';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'user' => new MessageOriginUser($this->properties),
            'hidden_user' => new MessageOriginHiddenUser($this->properties),
            'chat' => new MessageOriginChat($this->properties),
            'channel' => new MessageOriginChannel($this->properties),
            default => throw new \InvalidArgumentException('Unknown MessageOrigin type: ' . $this->type),
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
            self::TYPE_USER => new MessageOriginUser($data),
            self::TYPE_HIDDEN_USER => new MessageOriginHiddenUser($data),
            self::TYPE_CHAT => new MessageOriginChat($data),
            self::TYPE_CHANNEL => new MessageOriginChannel($data),
            default => throw new \InvalidArgumentException('Unknown MessageOrigin type: ' . ($data['type'] ?? 'null')),
        };
    }

}
