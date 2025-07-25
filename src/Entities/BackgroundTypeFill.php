<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundTypeFill Entity
 * @property string $type
 * @property BackgroundFill $fill
 * @property int $dark_theme_dimming
 */
class BackgroundTypeFill extends Entity
{
    protected function setEntities(): array
    {
        return [
            'fill' => BackgroundFill::class,
        ];
    }
}
