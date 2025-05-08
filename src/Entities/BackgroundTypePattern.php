<?php

namespace Al3x5\xBot\Entities;

/**
 * BackgroundTypePattern Entity
 * @property string $type;
 * @property Document $document;
 * @property BackgroundFill $fill;
 * @property int $intensity;
 * @property bool $is_inverted;
 * @property bool $is_moving;
 */
class BackgroundTypePattern extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'document' => Document::class,
            'fill' => BackgroundFill::class,
        ];
    }
}
