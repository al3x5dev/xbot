<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundTypePattern Entity
 * @property string $type
 * @property Document $document
 * @property BackgroundFill $fill
 * @property int $intensity
 * @property bool $is_inverted
 * @property bool $is_moving
 */
class BackgroundTypePattern extends Entity
{
    protected function setEntities(): array
    {
        return [
            'document' => Document::class,
            'fill' => BackgroundFill::class,
        ];
    }
}
