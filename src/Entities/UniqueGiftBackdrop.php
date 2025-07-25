<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGiftBackdrop Entity
 * @property string $name
 * @property UniqueGiftBackdropColors $colors
 * @property int $rarity_per_mille
 */
class UniqueGiftBackdrop extends Entity
{
    protected function setEntities(): array
    {
        return [
            'colors' => UniqueGiftBackdropColors::class,
        ];
    }
}
