<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGift Entity
 * @property string $gift_id
 * @property string $base_name
 * @property string $name
 * @property int $number
 * @property UniqueGiftModel $model
 * @property UniqueGiftSymbol $symbol
 * @property UniqueGiftBackdrop $backdrop
 * @property bool $is_premium
 * @property bool $is_burned
 * @property bool $is_from_blockchain
 * @property UniqueGiftColors $colors
 * @property Chat $publisher_chat
 */
class UniqueGift extends Entity
{
    protected function setEntities(): array
    {
        return [
            'model' => UniqueGiftModel::class,
            'symbol' => UniqueGiftSymbol::class,
            'backdrop' => UniqueGiftBackdrop::class,
            'colors' => UniqueGiftColors::class,
            'publisher_chat' => Chat::class,
        ];
    }
}
