<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMedia Entity
 */
class InputMedia extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve() : InputMediaAnimation|InputMediaDocument|InputMediaAudio|InputMediaPhoto|InputMediaVideo
    {
        return match ($this->type) {
            'photo' => new InputMediaPhoto($this->propertys),
            'video' => new InputMediaVideo($this->propertys),
            'animation' => new InputMediaAnimation($this->propertys),
            'audio' => new InputMediaAudio($this->propertys),
            'document' => new InputMediaDocument($this->propertys)
        };
    }
}
