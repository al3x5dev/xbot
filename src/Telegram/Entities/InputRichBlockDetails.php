<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockDetails Entity
 * @property string $type
 * @property RichText $summary
 * @property InputRichBlock[] $blocks
 * @property bool $is_open
 */
class InputRichBlockDetails extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'summary' => RichText::class,
            'blocks' => [InputRichBlock::class],
        ];
    }
}
