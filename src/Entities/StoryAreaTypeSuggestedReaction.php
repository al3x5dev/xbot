<?php

namespace Al3x5\xBot\Entities;

/**
 * StoryAreaTypeSuggestedReaction Entity
 * @property string $type;
 * @property ReactionType $reaction_type;
 * @property bool $is_dark;
 * @property bool $is_flipped;
 */
class StoryAreaTypeSuggestedReaction extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reaction_type' => ReactionType::class,
        ];
    }
}
