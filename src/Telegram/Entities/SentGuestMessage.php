<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SentGuestMessage Entity
 * @property string $inline_message_id
 */
class SentGuestMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
