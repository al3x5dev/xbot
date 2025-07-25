<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQuery Entity
 * @property string $id
 * @property User $from
 * @property string $query
 * @property string $offset
 * @property string $chat_type
 * @property Location $location
 */
class InlineQuery extends Entity
{
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class,
        ];
    }
}
