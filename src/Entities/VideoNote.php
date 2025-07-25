<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * VideoNote Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $length
 * @property int $duration
 * @property PhotoSize $thumbnail
 * @property int $file_size
 */
class VideoNote extends Entity
{
    protected function setEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
