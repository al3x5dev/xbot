<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * CommunityChatAdded Entity
 * @property Community $community
 */
class CommunityChatAdded extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'community' => Community::class,
        ];
    }
}
