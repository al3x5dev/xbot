<?php

namespace Al3x5\xBot\Entities;

/**
 * Location class
 * 
 * @property public float $latitude
 * @property public float $longitude
 * @property public float $horizontal_accuracy
 * @property public int $live_period
 * @property public int $heading
 * @property public int $proximity_alert_radius
 */
class Location extends Base
{
    protected function getEntities(): array
    {
        return [];
    }
}
