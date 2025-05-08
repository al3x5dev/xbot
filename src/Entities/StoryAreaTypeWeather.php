<?php

namespace Al3x5\xBot\Entities;

/**
 * StoryAreaTypeWeather Entity
 * @property string $type;
 * @property float $temperature;
 * @property string $emoji;
 * @property int $background_color;
 */
class StoryAreaTypeWeather extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
