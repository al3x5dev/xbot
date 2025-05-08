<?php

namespace Al3x5\xBot\Entities;

/**
 * InputSticker Entity
 * @property string $sticker;
 * @property string $format;
 * @property array $emoji_list;
 * @property MaskPosition $mask_position;
 * @property array $keywords;
 */
class InputSticker extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'mask_position' => MaskPosition::class,
        ];
    }
}
