<?php

namespace Al3x5\xBot\Entities;

/**
 * ReactionCount Entity
 * @property ReactionType $type;
 * @property int $total_count;
 */
class ReactionCount extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'type' => ReactionType::class,
        ];
    }
}
