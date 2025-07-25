<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * VideoChatEnded Entity
 * @property int $duration
 */
class VideoChatEnded extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
