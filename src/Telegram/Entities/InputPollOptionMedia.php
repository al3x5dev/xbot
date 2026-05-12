<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPollOptionMedia Entity
 */
class InputPollOptionMedia extends Entity
{
    
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_LIVE_PHOTO = 'live_photo';
    public const TYPE_LOCATION = 'location';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_STICKER = 'sticker';
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
            'live_photo' => new InputMediaLivePhoto($this->properties),
            'location' => new InputMediaLocation($this->properties),
            'photo' => new InputMediaPhoto($this->properties),
            'sticker' => new InputMediaSticker($this->properties),
            'venue' => new InputMediaVenue($this->properties),
            'video' => new InputMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPollOptionMedia type: ' . $this->type),
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
     * | live_photo | InputMediaLivePhoto |
     * | location | InputMediaLocation |
     * | photo | InputMediaPhoto |
     * | sticker | InputMediaSticker |
     * | venue | InputMediaVenue |
     * | video | InputMediaVideo |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_LIVE_PHOTO => new InputMediaLivePhoto($data),
            self::TYPE_LOCATION => new InputMediaLocation($data),
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_STICKER => new InputMediaSticker($data),
            self::TYPE_VENUE => new InputMediaVenue($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPollOptionMedia type: ' . ($data['type'] ?? 'null')),
        };
    }

}
