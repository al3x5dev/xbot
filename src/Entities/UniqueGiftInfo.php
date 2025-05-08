<?php

namespace Al3x5\xBot\Entities;

/**
 * UniqueGiftInfo Entity
 * @property UniqueGift $gift;
 * @property string $origin;
 * @property string $owned_gift_id;
 * @property int $transfer_star_count;
 */
class UniqueGiftInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
        ];
    }
}
