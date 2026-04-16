<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundType Entity
 */
class BackgroundType extends Entity
{
    
    public const TYPE_FILL = 'fill';
    public const TYPE_WALLPAPER = 'wallpaper';
    public const TYPE_PATTERN = 'pattern';
    public const TYPE_CHAT_THEME = 'chat_theme';

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
            self::TYPE_FILL => new BackgroundTypeFill($data),
            self::TYPE_WALLPAPER => new BackgroundTypeWallpaper($data),
            self::TYPE_PATTERN => new BackgroundTypePattern($data),
            self::TYPE_CHAT_THEME => new BackgroundTypeChatTheme($data),
            default => throw new \InvalidArgumentException('Unknown BackgroundType type: ' . ($data['type'] ?? 'null')),
        };
    }

}
