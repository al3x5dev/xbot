<?php

namespace Al3x5\xBot\Entities;

/**
 * BackgroundType Entity
 */
class BackgroundType extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): BackgroundTypeFill|BackgroundTypeWallpaper|BackgroundTypePattern|BackgroundTypeChatTheme
    {
        if (
            $this->hasProperty('fill') &&
            $this->hasProperty('dark_theme_dimming')
        ) {
            return new BackgroundTypeFill($this->propertys);
        }
        if (
            $this->hasProperty('document') &&
            $this->hasProperty('dark_theme_dimming')
        ) {
            return new BackgroundTypeWallpaper($this->propertys);
        }
        if ($this->hasProperty('theme_name')) {
            return new BackgroundTypeChatTheme($this->propertys);
        }
        return new BackgroundTypePattern($this->propertys);
    }
}
