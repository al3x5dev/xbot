<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * VideoQuality Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property string $codec
 * @property int $file_size
 */
class VideoQuality extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
