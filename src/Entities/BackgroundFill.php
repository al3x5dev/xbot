<?php

namespace Al3x5\xBot\Entities;

/**
 * BackgroundFill Entity
 */
class BackgroundFill extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): BackgroundFillSolid|BackgroundFillGradient|BackgroundFillFreeformGradient
    {
        if ($this->hasProperty('color')) {
            return new BackgroundFillSolid($this->propertys);
        }
        if ($this->hasProperty('colors')) {
            return new BackgroundFillFreeformGradient($this->propertys);
        }
        return new BackgroundFillGradient($this->propertys);
    }
}
