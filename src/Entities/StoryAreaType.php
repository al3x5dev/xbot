<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryAreaType Entity
 */
class StoryAreaType extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        return match($this->type) {
            'location' => new StoryAreaTypeLocation($this->properties),
            'suggested_reaction' => new StoryAreaTypeSuggestedReaction($this->properties),
            'link' => new StoryAreaTypeLink($this->properties),
            'weather' => new StoryAreaTypeWeather($this->properties),
            'unique_gift' => new StoryAreaTypeUniqueGift($this->properties),
            default => throw new \InvalidArgumentException('Unknown StoryAreaType type: ' . $this->type),
        };
    }
}
