<?php

namespace Al3x5\xBot\Entities;

/**
 * OwnedGifts Entity
 * @property int $total_count;
 * @property \OwnedGift[] $gifts;
 * @property string $next_offset;
 */
class OwnedGifts extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
