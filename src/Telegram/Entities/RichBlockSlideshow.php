<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockSlideshow Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class RichBlockSlideshow extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
