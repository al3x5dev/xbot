<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReactionType Entity
 */
class ReactionType extends Entity
{
    
    public const TYPE_EMOJI = 'emoji';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';
    public const TYPE_PAID = 'paid';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'emoji' => new ReactionTypeEmoji($this->properties),
            'custom_emoji' => new ReactionTypeCustomEmoji($this->properties),
            'paid' => new ReactionTypePaid($this->properties),
            default => throw new \InvalidArgumentException('Unknown ReactionType type: ' . $this->type),
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
            self::TYPE_EMOJI => new ReactionTypeEmoji($data),
            self::TYPE_CUSTOM_EMOJI => new ReactionTypeCustomEmoji($data),
            self::TYPE_PAID => new ReactionTypePaid($data),
            default => throw new \InvalidArgumentException('Unknown ReactionType type: ' . ($data['type'] ?? 'null')),
        };
    }

}
