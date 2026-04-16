<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPaidMedia Entity
 */
class InputPaidMedia extends Entity
{
    
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputPaidMediaPhoto($this->properties),
            'video' => new InputPaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPaidMedia type: ' . $this->type),
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
            self::TYPE_PHOTO => new InputPaidMediaPhoto($data),
            self::TYPE_VIDEO => new InputPaidMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPaidMedia type: ' . ($data['type'] ?? 'null')),
        };
    }

}
