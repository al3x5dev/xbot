<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * OwnedGifts Entity
 * @property int $total_count
 * @property OwnedGift[] $gifts
 * @property string $next_offset
 */
class OwnedGifts extends Entity
{
    protected function setEntities(): array
    {
        return [
            'gifts' => [OwnedGift::class],
        ];
    }
}
