<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockCollage Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class RichBlockCollage extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
