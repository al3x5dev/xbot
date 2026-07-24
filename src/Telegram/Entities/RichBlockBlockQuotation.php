<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockBlockQuotation Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichText $credit
 */
class RichBlockBlockQuotation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
