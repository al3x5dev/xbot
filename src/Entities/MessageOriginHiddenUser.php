<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageOriginHiddenUser Entity
 * @property string $type
 * @property int $date
 * @property string $sender_user_name
 */
class MessageOriginHiddenUser extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
