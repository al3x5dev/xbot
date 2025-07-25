<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryAreaTypeSuggestedReaction Entity
 * @property string $type
 * @property ReactionType $reaction_type
 * @property bool $is_dark
 * @property bool $is_flipped
 */
class StoryAreaTypeSuggestedReaction extends Entity
{
    protected function setEntities(): array
    {
        return [
            'reaction_type' => ReactionType::class,
        ];
    }
}
