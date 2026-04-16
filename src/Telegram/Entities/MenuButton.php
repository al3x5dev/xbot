<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MenuButton Entity
 */
class MenuButton extends Entity
{
    
    public const TYPE_COMMANDS = 'commands';
    public const TYPE_WEB_APP = 'web_app';
    public const TYPE_DEFAULT = 'default';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'commands' => new MenuButtonCommands($this->properties),
            'web_app' => new MenuButtonWebApp($this->properties),
            'default' => new MenuButtonDefault($this->properties),
            default => throw new \InvalidArgumentException('Unknown MenuButton type: ' . $this->type),
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
            self::TYPE_COMMANDS => new MenuButtonCommands($data),
            self::TYPE_WEB_APP => new MenuButtonWebApp($data),
            self::TYPE_DEFAULT => new MenuButtonDefault($data),
            default => throw new \InvalidArgumentException('Unknown MenuButton type: ' . ($data['type'] ?? 'null')),
        };
    }

}
