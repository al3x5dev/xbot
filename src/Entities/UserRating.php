<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UserRating Entity
 * @property int $level
 * @property int $rating
 * @property int $current_level_rating
 * @property int $next_level_rating
 */
class UserRating extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
