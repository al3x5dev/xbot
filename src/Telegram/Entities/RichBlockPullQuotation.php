<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockPullQuotation Entity
 * @property string $type
 * @property RichText $text
 * @property RichText $credit
 */
class RichBlockPullQuotation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
