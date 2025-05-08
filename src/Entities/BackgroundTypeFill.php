<?php

namespace Al3x5\xBot\Entities;

/**
 * BackgroundTypeFill Entity
 * @property string $type;
 * @property BackgroundFill $fill;
 * @property int $dark_theme_dimming;
 */
class BackgroundTypeFill extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'fill' => BackgroundFill::class,
        ];
    }
}
