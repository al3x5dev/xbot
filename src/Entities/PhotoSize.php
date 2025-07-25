<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PhotoSize Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property int $file_size
 */
class PhotoSize extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
