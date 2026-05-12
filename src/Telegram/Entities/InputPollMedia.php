<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPollMedia Entity
 */
class InputPollMedia extends Entity
{
    
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_LIVE_PHOTO = 'live_photo';
    public const TYPE_LOCATION = 'location';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VENUE = 'venue';
    public const TYPE_VIDEO = 'video';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'animation' => new InputMediaAnimation($this->properties),
            'audio' => new InputMediaAudio($this->properties),
            'document' => new InputMediaDocument($this->properties),
            'live_photo' => new InputMediaLivePhoto($this->properties),
            'location' => new InputMediaLocation($this->properties),
            'photo' => new InputMediaPhoto($this->properties),
            'venue' => new InputMediaVenue($this->properties),
            'video' => new InputMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPollMedia type: ' . $this->type),
        };
    }

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     *
     * | type= | Creates |
     * |-------|----------|
     * | animation | InputMediaAnimation |
     * | audio | InputMediaAudio |
     * | document | InputMediaDocument |
     * | live_photo | InputMediaLivePhoto |
     * | location | InputMediaLocation |
     * | photo | InputMediaPhoto |
     * | venue | InputMediaVenue |
     * | video | InputMediaVideo |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_AUDIO => new InputMediaAudio($data),
            self::TYPE_DOCUMENT => new InputMediaDocument($data),
            self::TYPE_LIVE_PHOTO => new InputMediaLivePhoto($data),
            self::TYPE_LOCATION => new InputMediaLocation($data),
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_VENUE => new InputMediaVenue($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPollMedia type: ' . ($data['type'] ?? 'null')),
        };
    }

}
