<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMediaLink Entity
 * @property string $type
 * @property string $url
 */
class InputMediaLink extends InputPollOptionMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
