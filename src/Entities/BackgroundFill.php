<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundFill Entity
 */
class BackgroundFill extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'solid' => new BackgroundFillSolid($this->properties),
            'gradient' => new BackgroundFillGradient($this->properties),
            'freeform_gradient' => new BackgroundFillFreeformGradient($this->properties),
            default => throw new \InvalidArgumentException('Unknown BackgroundFill type: ' . $this->type),
        };
    }
}
