<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGiftInfo Entity
 * @property UniqueGift $gift
 * @property string $origin
 * @property string $last_resale_currency
 * @property int $last_resale_amount
 * @property string $owned_gift_id
 * @property int $transfer_star_count
 * @property int $next_transfer_date
 */
class UniqueGiftInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
        ];
    }
}
