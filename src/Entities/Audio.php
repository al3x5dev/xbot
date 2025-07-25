<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Audio Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $duration
 * @property string $performer
 * @property string $title
 * @property string $file_name
 * @property string $mime_type
 * @property int $file_size
 * @property PhotoSize $thumbnail
 */
class Audio extends Entity
{
    protected function setEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
