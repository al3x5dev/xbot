<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ResponseParameters Entity
 * @property int $migrate_to_chat_id
 * @property int $retry_after
 */
class ResponseParameters extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
