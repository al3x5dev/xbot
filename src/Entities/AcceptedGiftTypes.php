<?php

namespace Al3x5\xBot\Entities;

/**
 * AcceptedGiftTypes Entity
 * @property bool $unlimited_gifts;
 * @property bool $limited_gifts;
 * @property bool $unique_gifts;
 * @property bool $premium_subscription;
 */
class AcceptedGiftTypes extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
