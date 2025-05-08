<?php

namespace Al3x5\xBot\Entities;

/**
 * InputProfilePhoto Entity
 */
class InputProfilePhoto extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): InputProfilePhotoStatic|InputProfilePhotoAnimated
    {
        return $this->hasProperty('animation')
            ? new InputProfilePhotoAnimated($this->propertys)
            : new InputProfilePhotoStatic($this->propertys);
    }
}
