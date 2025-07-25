<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessOpeningHours Entity
 * @property string $time_zone_name
 * @property BusinessOpeningHoursInterval[] $opening_hours
 */
class BusinessOpeningHours extends Entity
{
    protected function setEntities(): array
    {
        return [
            'opening_hours' => [BusinessOpeningHoursInterval::class],
        ];
    }
}
