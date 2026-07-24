<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockPhoto Entity
 * @property string $type
 * @property PhotoSize[] $photo
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockPhoto extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
