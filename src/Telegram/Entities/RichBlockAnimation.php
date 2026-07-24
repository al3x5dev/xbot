<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockAnimation Entity
 * @property string $type
 * @property Animation $animation
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockAnimation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'animation' => Animation::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
