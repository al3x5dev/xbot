<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockVideo Entity
 * @property string $type
 * @property Video $video
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockVideo extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'video' => Video::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
