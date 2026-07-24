<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockMap Entity
 * @property string $type
 * @property Location $location
 * @property int $zoom
 * @property int $width
 * @property int $height
 * @property RichBlockCaption $caption
 */
class InputRichBlockMap extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
