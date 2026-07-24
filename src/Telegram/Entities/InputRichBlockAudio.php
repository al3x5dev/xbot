<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockAudio Entity
 * @property string $type
 * @property InputMediaAudio $audio
 * @property RichBlockCaption $caption
 */
class InputRichBlockAudio extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'audio' => InputMediaAudio::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
