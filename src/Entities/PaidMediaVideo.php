<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaVideo Entity
 * @property string $type
 * @property Video $video
 */
class PaidMediaVideo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'video' => Video::class,
        ];
    }
}
