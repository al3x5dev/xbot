<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextBankCardNumber Entity
 * @property string $type
 * @property RichText $text
 * @property string $bank_card_number
 */
class RichTextBankCardNumber extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
