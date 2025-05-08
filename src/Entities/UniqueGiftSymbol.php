<?php

namespace Al3x5\xBot\Entities;

/**
 * UniqueGiftSymbol Entity
 * @property string $name;
 * @property Sticker $sticker;
 * @property int $rarity_per_mille;
 */
class UniqueGiftSymbol extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
