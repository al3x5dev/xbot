<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * LabeledPrice Entity
 * @property string $label
 * @property int $amount
 */
class LabeledPrice extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
