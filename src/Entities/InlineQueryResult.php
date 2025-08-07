<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResult Entity
 */
class InlineQueryResult extends Entity
{
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
}
