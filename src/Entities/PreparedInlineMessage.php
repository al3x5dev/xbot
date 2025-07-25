<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PreparedInlineMessage Entity
 * @property string $id
 * @property int $expiration_date
 */
class PreparedInlineMessage extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
