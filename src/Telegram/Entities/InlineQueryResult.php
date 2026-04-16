<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResult Entity
 */
class InlineQueryResult extends Entity
{
    
    public const TYPE_ARTICLE = 'article';
    public const TYPE_LOCATION = 'location';
    public const TYPE_VENUE = 'venue';
    public const TYPE_CONTACT = 'contact';
    public const TYPE_GAME = 'game';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_GIF = 'gif';
    public const TYPE_MPEG4_GIF = 'mpeg4_gif';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VOICE = 'voice';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_STICKER = 'sticker';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'article' => new InlineQueryResultArticle($this->properties),
            'location' => new InlineQueryResultLocation($this->properties),
            'venue' => new InlineQueryResultVenue($this->properties),
            'contact' => new InlineQueryResultContact($this->properties),
            'game' => new InlineQueryResultGame($this->properties),
            'sticker' => new InlineQueryResultCachedSticker($this->properties),
            'photo' => $this->hasProperty('photo_url')
                ? new InlineQueryResultPhoto($this->properties)
                : new InlineQueryResultCachedPhoto($this->properties),
            'gif' => $this->hasProperty('gif_url') 
                ? new InlineQueryResultGif($this->properties)
                : new InlineQueryResultCachedGif($this->properties),
            'mpeg4_gif' => $this->hasProperty('mpeg4_url') 
                ? new InlineQueryResultMpeg4Gif($this->properties)
                : new InlineQueryResultCachedMpeg4Gif($this->properties),
            'document' => $this->hasProperty('document_url')
                ? new InlineQueryResultDocument($this->properties)
                : new InlineQueryResultCachedDocument($this->properties),
            'video' => $this->hasProperty('video_url')
                ? new InlineQueryResultVideo($this->properties)
                : new InlineQueryResultCachedVideo($this->properties),
            'voice' => $this->hasProperty('voice_url')
                ? new InlineQueryResultVoice($this->properties)
                : new InlineQueryResultCachedVoice($this->properties),
            'audio' => $this->hasProperty('audio_url')
                ? new InlineQueryResultAudio ($this->properties)
                : new InlineQueryResultCachedAudio($this->properties),
            default => throw new \InvalidArgumentException('Unknown InlineQueryResult type: ' . $this->type),
        };
    }

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * | type= | Creates |
     * |-------|----------|
     * | article | InlineQueryResultArticle |
     * | location | InlineQueryResultLocation |
     * | venue | InlineQueryResultVenue |
     * | contact | InlineQueryResultContact |
     * | game | InlineQueryResultGame |
     * | photo | InlineQueryResultPhoto or CachedPhoto* |
     * | gif | InlineQueryResultGif or CachedGif* |
     * | document | InlineQueryResultDocument or CachedDocument* |
     * | video | InlineQueryResultVideo or CachedVideo* |
     * | voice | InlineQueryResultVoice or CachedVoice* |
     * | audio | InlineQueryResultAudio or CachedAudio* |
     * | sticker | InlineQueryResultCachedSticker |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        $type = $data['type'] ?? null;
        return match($type) {
            self::TYPE_ARTICLE => new InlineQueryResultArticle($data),
            self::TYPE_LOCATION => new InlineQueryResultLocation($data),
            self::TYPE_VENUE => new InlineQueryResultVenue($data),
            self::TYPE_CONTACT => new InlineQueryResultContact($data),
            self::TYPE_GAME => new InlineQueryResultGame($data),
            self::TYPE_STICKER => new InlineQueryResultCachedSticker($data),
            self::TYPE_PHOTO => isset($data['photo_url'])
                ? new InlineQueryResultPhoto($data)
                : new InlineQueryResultCachedPhoto($data),
            self::TYPE_GIF => isset($data['gif_url'])
                ? new InlineQueryResultGif($data)
                : new InlineQueryResultCachedGif($data),
            self::TYPE_MPEG4_GIF => isset($data['mpeg4_url'])
                ? new InlineQueryResultMpeg4Gif($data)
                : new InlineQueryResultCachedMpeg4Gif($data),
            self::TYPE_DOCUMENT => isset($data['document_url'])
                ? new InlineQueryResultDocument($data)
                : new InlineQueryResultCachedDocument($data),
            self::TYPE_VIDEO => isset($data['video_url'])
                ? new InlineQueryResultVideo($data)
                : new InlineQueryResultCachedVideo($data),
            self::TYPE_VOICE => isset($data['voice_url'])
                ? new InlineQueryResultVoice($data)
                : new InlineQueryResultCachedVoice($data),
            self::TYPE_AUDIO => isset($data['audio_url'])
                ? new InlineQueryResultAudio($data)
                : new InlineQueryResultCachedAudio($data),
            default => throw new \InvalidArgumentException('Unknown InlineQueryResult type: ' . ($type ?? 'null')),
        };
    }

}
