<?php

namespace Al3x5\xBot\Entities;

/**
 * UniqueGiftBackdrop Entity
 * @property string $name;
 * @property UniqueGiftBackdropColors $colors;
 * @property int $rarity_per_mille;
 */
class UniqueGiftBackdrop extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'colors' => UniqueGiftBackdropColors::class,
        ];
    }
}
