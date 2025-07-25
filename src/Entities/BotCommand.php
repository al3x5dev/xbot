<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotCommand Entity
 * @property string $command
 * @property string $description
 */
class BotCommand extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
