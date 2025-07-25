<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaPhoto Entity
 * @property string $type
 * @property PhotoSize[] $photo
 */
class PaidMediaPhoto extends Entity
{
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
