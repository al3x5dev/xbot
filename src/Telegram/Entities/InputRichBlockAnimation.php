<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockAnimation Entity
 * @property string $type
 * @property InputMediaAnimation $animation
 * @property RichBlockCaption $caption
 */
class InputRichBlockAnimation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'animation' => InputMediaAnimation::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
