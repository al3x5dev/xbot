<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SentWebAppMessage Entity
 * @property string $inline_message_id
 */
class SentWebAppMessage extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
