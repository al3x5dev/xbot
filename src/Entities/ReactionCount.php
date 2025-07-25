<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReactionCount Entity
 * @property ReactionType $type
 * @property int $total_count
 */
class ReactionCount extends Entity
{
    protected function setEntities(): array
    {
        return [
            'type' => ReactionType::class,
        ];
    }
}
