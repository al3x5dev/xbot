<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGift Entity
 * @property string $base_name
 * @property string $name
 * @property int $number
 * @property UniqueGiftModel $model
 * @property UniqueGiftSymbol $symbol
 * @property UniqueGiftBackdrop $backdrop
 */
class UniqueGift extends Entity
{
    protected function setEntities(): array
    {
        return [
            'model' => UniqueGiftModel::class,
            'symbol' => UniqueGiftSymbol::class,
            'backdrop' => UniqueGiftBackdrop::class,
        ];
    }
}
