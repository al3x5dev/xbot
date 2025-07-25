<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundFillGradient Entity
 * @property string $type
 * @property int $top_color
 * @property int $bottom_color
 * @property int $rotation_angle
 */
class BackgroundFillGradient extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
