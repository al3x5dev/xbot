<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichMessageMedia Entity
 * @property string $id
 * @property InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media
 */
class InputRichMessageMedia extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'media' => InputMediaAnimation|InputMediaAudio|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote::class,
        ];
    }
}
