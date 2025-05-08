<?php

namespace Al3x5\xBot\Entities;

/**
 * MenuButton Entity
 */
class MenuButton extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): MenuButtonCommands|MenuButtonWebApp|MenuButtonDefault
    {
        return match ($this->__get('type')) {
            'commands' => new MenuButtonCommands($this->propertys),
            'web_app' => new MenuButtonWebApp($this->propertys),
            'default' => new MenuButtonDefault($this->propertys)
        };
    }
}
