<?php

namespace Al3x5\xBot\Entities;

/**
 * BackgroundTypeWallpaper Entity
 * @property string $type;
 * @property Document $document;
 * @property int $dark_theme_dimming;
 * @property bool $is_blurred;
 * @property bool $is_moving;
 */
class BackgroundTypeWallpaper extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'document' => Document::class,
        ];
    }
}
