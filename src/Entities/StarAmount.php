<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StarAmount Entity
 * @property int $amount
 * @property int $nanostar_amount
 */
class StarAmount extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
