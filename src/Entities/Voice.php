<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Voice Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $duration
 * @property string $mime_type
 * @property int $file_size
 */
class Voice extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
