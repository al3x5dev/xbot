<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMediaSticker Entity
 * @property string $type
 * @property string $media
 * @property string $emoji
 */
class InputMediaSticker extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
