<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaPreview Entity
 * @property string $type
 * @property int $width
 * @property int $height
 * @property int $duration
 */
class PaidMediaPreview extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
