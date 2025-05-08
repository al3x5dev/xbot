<?php

namespace Al3x5\xBot\Entities;

/**
 * UniqueGift Entity
 * @property string $base_name;
 * @property string $name;
 * @property int $number;
 * @property UniqueGiftModel $model;
 * @property UniqueGiftSymbol $symbol;
 * @property UniqueGiftBackdrop $backdrop;
 */
class UniqueGift extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'model' => UniqueGiftModel::class,
            'symbol' => UniqueGiftSymbol::class,
            'backdrop' => UniqueGiftBackdrop::class,
        ];
    }
}
