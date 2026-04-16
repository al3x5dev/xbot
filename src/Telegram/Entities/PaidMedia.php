<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMedia Entity
 */
class PaidMedia extends Entity
{
    
    public const TYPE_PREVIEW = 'preview';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type){
            'preview' => new PaidMediaPreview($this->properties),
            'photo' => new PaidMediaPhoto($this->properties),
            'video' => new PaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown PaidMedia type: ' . $this->type),
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
            self::TYPE_PREVIEW => new PaidMediaPreview($data),
            self::TYPE_PHOTO => new PaidMediaPhoto($data),
            self::TYPE_VIDEO => new PaidMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown PaidMedia type: ' . ($data['type'] ?? 'null')),
        };
    }

}
