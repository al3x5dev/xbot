<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Sticker Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property string $type
 * @property int $width
 * @property int $height
 * @property bool $is_animated
 * @property bool $is_video
 * @property PhotoSize $thumbnail
 * @property string $emoji
 * @property string $set_name
 * @property File $premium_animation
 * @property MaskPosition $mask_position
 * @property string $custom_emoji_id
 * @property bool $needs_repainting
 * @property int $file_size
 */
class Sticker extends Entity
{
    protected function setEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
            'premium_animation' => File::class,
            'mask_position' => MaskPosition::class,
        ];
    }
}
