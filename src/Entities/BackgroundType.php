<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundType Entity
 */
class BackgroundType extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'fill' => new BackgroundTypeFill($this->properties),
            'wallpaper' => new BackgroundTypeWallpaper($this->properties),
            'pattern' => new BackgroundTypePattern($this->properties),
            'chat_theme' => new BackgroundTypeChatTheme($this->properties),
            default => throw new \InvalidArgumentException('Unknown BackgroundType type: ' . $this->type),
        };
    }
}
