<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MenuButton Entity
 */
class MenuButton extends Entity
{
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
}
