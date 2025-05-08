<?php

namespace Al3x5\xBot\Entities;

/**
 * StickerSet Entity
 * @property string $name;
 * @property string $title;
 * @property string $sticker_type;
 * @property \Sticker[] $stickers;
 * @property PhotoSize $thumbnail;
 */
class StickerSet extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
