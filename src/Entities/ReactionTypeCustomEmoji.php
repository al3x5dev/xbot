<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReactionTypeCustomEmoji Entity
 * @property string $type
 * @property string $custom_emoji_id
 */
class ReactionTypeCustomEmoji extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
