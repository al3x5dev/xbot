<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockPhoto Entity
 * @property string $type
 * @property InputMediaPhoto $photo
 * @property RichBlockCaption $caption
 */
class InputRichBlockPhoto extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => InputMediaPhoto::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
