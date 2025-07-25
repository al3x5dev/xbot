<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReactionTypeEmoji Entity
 * @property string $type
 * @property string $emoji
 */
class ReactionTypeEmoji extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
