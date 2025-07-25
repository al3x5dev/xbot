<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Video Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property int $duration
 * @property PhotoSize $thumbnail
 * @property PhotoSize[] $cover
 * @property int $start_timestamp
 * @property string $file_name
 * @property string $mime_type
 * @property int $file_size
 */
class Video extends Entity
{
    protected function setEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
            'cover' => [PhotoSize::class],
        ];
    }
}
