<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryAreaType Entity
 */
class StoryAreaType extends Entity
{
    
    public const TYPE_LOCATION = 'location';
    public const TYPE_SUGGESTED_REACTION = 'suggested_reaction';
    public const TYPE_LINK = 'link';
    public const TYPE_WEATHER = 'weather';
    public const TYPE_UNIQUE_GIFT = 'unique_gift';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
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

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_LOCATION => new StoryAreaTypeLocation($data),
            self::TYPE_SUGGESTED_REACTION => new StoryAreaTypeSuggestedReaction($data),
            self::TYPE_LINK => new StoryAreaTypeLink($data),
            self::TYPE_WEATHER => new StoryAreaTypeWeather($data),
            self::TYPE_UNIQUE_GIFT => new StoryAreaTypeUniqueGift($data),
            default => throw new \InvalidArgumentException('Unknown StoryAreaType type: ' . ($data['type'] ?? 'null')),
        };
    }

}
