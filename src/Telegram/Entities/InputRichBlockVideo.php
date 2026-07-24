<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockVideo Entity
 * @property string $type
 * @property InputMediaVideo $video
 * @property RichBlockCaption $caption
 */
class InputRichBlockVideo extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'video' => InputMediaVideo::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
