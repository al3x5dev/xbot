<?php

namespace Al3x5\xBot\Entities;

/**
 * Location Entity
 * @property float $latitude;
 * @property float $longitude;
 * @property float $horizontal_accuracy;
 * @property int $live_period;
 * @property int $heading;
 * @property int $proximity_alert_radius;
 */
class Location extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
