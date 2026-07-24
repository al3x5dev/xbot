<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextMathematicalExpression Entity
 * @property string $type
 * @property string $expression
 */
class RichTextMathematicalExpression extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
