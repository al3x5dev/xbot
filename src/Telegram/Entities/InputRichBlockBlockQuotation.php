<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockBlockQuotation Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichText $credit
 */
class InputRichBlockBlockQuotation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
