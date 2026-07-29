<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputProfilePhotoAnimated Entity
 * @property string $type
 * @property string $animation
 * @property float $main_frame_timestamp
 */
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
