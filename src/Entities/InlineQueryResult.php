<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResult Entity
 */
class InlineQueryResult extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): InlineQueryResultCachedAudio|InlineQueryResultCachedDocument|InlineQueryResultCachedGif|InlineQueryResultCachedMpeg4Gif|InlineQueryResultCachedPhoto|InlineQueryResultCachedSticker|InlineQueryResultCachedVideo|InlineQueryResultCachedVoice|InlineQueryResultArticle|InlineQueryResultAudio|InlineQueryResultContact|InlineQueryResultGame|InlineQueryResultDocument|InlineQueryResultGif|InlineQueryResultLocation|InlineQueryResultMpeg4Gif|InlineQueryResultPhoto|InlineQueryResultVenue|InlineQueryResultVideo|InlineQueryResultVoice
    {
        if ($this->hasProperty('audio_file_id')) {
            return new InlineQueryResultCachedAudio($this->propertys);
        }
        if ($this->hasProperty('voice_file_id')) {
            return new InlineQueryResultCachedVoice($this->propertys);
        }
        if ($this->hasProperty('video_file_id')) {
            return new InlineQueryResultCachedVideo($this->propertys);
        }
        if ($this->hasProperty('sticker_file_id')) {
            return new InlineQueryResultCachedSticker($this->propertys);
        }
        if ($this->hasProperty('document_file_id')) {
            return new InlineQueryResultCachedDocument($this->propertys);
        }
        if ($this->hasProperty('mpeg4_file_id')) {
            return new InlineQueryResultCachedMpeg4Gif($this->propertys);
        }
        if ($this->hasProperty('gif_file_id')) {
            return new InlineQueryResultCachedGif($this->propertys);
        }
        if ($this->hasProperty('photo_file_id')) {
            return new InlineQueryResultCachedPhoto($this->propertys);
        }

        return match ($this->propertys['type']) {

            'article' => new InlineQueryResultArticle($this->propertys),
            'audio' => new InlineQueryResultAudio($this->propertys),
            'contact' => new InlineQueryResultContact($this->propertys),
            'game' => new InlineQueryResultGame($this->propertys),
            'document' => new InlineQueryResultDocument($this->propertys),
            'gif' => new InlineQueryResultGif($this->propertys),
            'location' => new InlineQueryResultLocation($this->propertys),
            'mpeg4_gif' => new InlineQueryResultMpeg4Gif($this->propertys),
            'photo' => new InlineQueryResultPhoto($this->propertys),
            'venue' => new InlineQueryResultVenue($this->propertys),
            'video' => new InlineQueryResultVideo($this->propertys),
            'voice' => new InlineQueryResultVoice($this->propertys),
        };
    }
}
