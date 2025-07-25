<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGiftModel Entity
 * @property string $name
 * @property Sticker $sticker
 * @property int $rarity_per_mille
 */
class UniqueGiftModel extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
