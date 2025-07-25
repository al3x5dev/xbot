<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryAreaTypeWeather Entity
 * @property string $type
 * @property float $temperature
 * @property string $emoji
 * @property int $background_color
 */
class StoryAreaTypeWeather extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
