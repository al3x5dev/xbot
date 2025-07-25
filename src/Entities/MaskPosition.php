<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MaskPosition Entity
 * @property string $point
 * @property float $x_shift
 * @property float $y_shift
 * @property float $scale
 */
class MaskPosition extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
