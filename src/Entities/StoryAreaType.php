<?php

namespace Al3x5\xBot\Entities;

/**
 * StoryAreaType Entity
 */
class StoryAreaType extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): StoryAreaTypeLocation|StoryAreaTypeSuggestedReaction|StoryAreaTypeLink|StoryAreaTypeWeather|StoryAreaTypeUniqueGift
    {
        if ($this->hasProperty('url')) {
            return new StoryAreaTypeLink($this->propertys);
        }
        if ($this->hasProperty('name')) {
            return new StoryAreaTypeUniqueGift($this->propertys);
        }
        if (
            $this->hasProperty('temperature') &&
            $this->hasProperty('emoji') &&
            $this->hasProperty('background_color')
        ) {
            return new StoryAreaTypeWeather($this->propertys);
        }
        if (
            $this->hasProperty('latitude') &&
            $this->hasProperty('longitude') &&
            $this->hasProperty('address')
        ) {
            return new StoryAreaTypeLocation($this->propertys);
        }
        return new StoryAreaTypeSuggestedReaction($this->propertys);
    }
}
