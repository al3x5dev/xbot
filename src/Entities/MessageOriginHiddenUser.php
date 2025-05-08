<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageOriginHiddenUser Entity
 * @property string $type;
 * @property int $date;
 * @property string $sender_user_name;
 */
class MessageOriginHiddenUser extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
