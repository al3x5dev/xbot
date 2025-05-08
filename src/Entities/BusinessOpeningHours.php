<?php

namespace Al3x5\xBot\Entities;

/**
 * BusinessOpeningHours Entity
 * @property string $time_zone_name;
 * @property \BusinessOpeningHoursInterval[] $opening_hours;
 */
class BusinessOpeningHours extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
