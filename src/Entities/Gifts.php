<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Gifts Entity
 * @property Gift[] $gifts
 */
class Gifts extends Entity
{
    protected function setEntities(): array
    {
        return [
            'gifts' => [Gift::class],
        ];
    }
}
