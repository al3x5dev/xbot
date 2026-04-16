<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMedia Entity
 */
class InputMedia extends Entity
{
    
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_AUDIO = 'audio';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputMediaPhoto($this->properties),
            'video' => new InputMediaVideo($this->properties),
            'animation' => new InputMediaAnimation($this->properties),
            'document' => new InputMediaDocument($this->properties),
            'audio' => new InputMediaAudio($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputMedia type: ' . $this->type),
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
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_DOCUMENT => new InputMediaDocument($data),
            self::TYPE_AUDIO => new InputMediaAudio($data),
            default => throw new \InvalidArgumentException('Unknown InputMedia type: ' . ($data['type'] ?? 'null')),
        };
    }

}
