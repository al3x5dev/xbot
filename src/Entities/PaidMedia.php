<?php

namespace Al3x5\xBot\Entities;

/**
 * PaidMedia Entity
 */
class PaidMedia extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): PaidMediaPreview|PaidMediaPhoto|PaidMediaVideo
    {
        if ($this->hasProperty('photo')) {
            return new PaidMediaPhoto($this->propertys);
        }
        if ($this->hasProperty('video')) {
            return new PaidMediaVideo($this->propertys);
        }
        return new PaidMediaPreview($this->propertys);
    }
}
