<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessOpeningHoursInterval Entity
 * @property int $opening_minute
 * @property int $closing_minute
 */
class BusinessOpeningHoursInterval extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
