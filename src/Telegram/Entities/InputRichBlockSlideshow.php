<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockSlideshow Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class InputRichBlockSlideshow extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
