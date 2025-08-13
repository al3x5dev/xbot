<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMedia Entity
 */
class InputMedia extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputMediaPhoto($this->properties),
            'video' => new InputMediaVideo($this->properties),
            'animation' => new InputMediaAnimation($this->properties),
            'document' => new InputMediaDocument($this->properties),
            'audio' => new InputMediaAudio($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputMedia type: ' . $this->type),
        };
    }
}
