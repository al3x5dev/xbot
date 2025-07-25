<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * AcceptedGiftTypes Entity
 * @property bool $unlimited_gifts
 * @property bool $limited_gifts
 * @property bool $unique_gifts
 * @property bool $premium_subscription
 */
class AcceptedGiftTypes extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
