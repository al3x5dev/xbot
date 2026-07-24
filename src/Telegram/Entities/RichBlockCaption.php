<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockCaption Entity
 * @property RichText $text
 * @property RichText $credit
 */
class RichBlockCaption extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
