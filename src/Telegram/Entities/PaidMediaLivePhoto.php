<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaLivePhoto Entity
 * @property string $type
 * @property LivePhoto $live_photo
 */
class PaidMediaLivePhoto extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'live_photo' => LivePhoto::class,
        ];
    }
}
