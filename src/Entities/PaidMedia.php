<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMedia Entity
 */
class PaidMedia extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        return match($this->type){
            'preview' => new PaidMediaPreview($this->properties),
            'photo' => new PaidMediaPhoto($this->properties),
            'video' => new PaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown PaidMedia type: ' . $this->type),
        };
    }
}
