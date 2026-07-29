<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichMessage Entity
 * @property RichBlock[] $blocks
 * @property bool $is_rtl
 */
class RichMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
        ];
    }
}
