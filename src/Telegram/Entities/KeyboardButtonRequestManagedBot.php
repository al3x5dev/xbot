<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * KeyboardButtonRequestManagedBot Entity
 * @property int $request_id
 * @property string $suggested_name
 * @property string $suggested_username
 */
class KeyboardButtonRequestManagedBot extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
