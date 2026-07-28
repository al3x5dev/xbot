<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockAudio Entity
 * @property string $type
 * @property Audio $audio
 * @property RichBlockCaption $caption
 */
class RichBlockAudio extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'audio' => Audio::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
