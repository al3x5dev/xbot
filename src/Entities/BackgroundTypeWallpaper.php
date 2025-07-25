<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundTypeWallpaper Entity
 * @property string $type
 * @property Document $document
 * @property int $dark_theme_dimming
 * @property bool $is_blurred
 * @property bool $is_moving
 */
class BackgroundTypeWallpaper extends Entity
{
    protected function setEntities(): array
    {
        return [
            'document' => Document::class,
        ];
    }
}
