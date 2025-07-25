<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StickerSet Entity
 * @property string $name
 * @property string $title
 * @property string $sticker_type
 * @property Sticker[] $stickers
 * @property PhotoSize $thumbnail
 */
class StickerSet extends Entity
{
    protected function setEntities(): array
    {
        return [
            'stickers' => [Sticker::class],
            'thumbnail' => PhotoSize::class,
        ];
    }
}
