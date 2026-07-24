<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockDetails Entity
 * @property string $type
 * @property RichText $summary
 * @property RichBlock[] $blocks
 * @property bool $is_open
 */
class RichBlockDetails extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'summary' => RichText::class,
            'blocks' => [RichBlock::class],
        ];
    }
}
