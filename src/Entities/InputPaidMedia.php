<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPaidMedia Entity
 */
class InputPaidMedia extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputPaidMediaPhoto($this->properties),
            'video' => new InputPaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPaidMedia type: ' . $this->type),
        };
    }
}
