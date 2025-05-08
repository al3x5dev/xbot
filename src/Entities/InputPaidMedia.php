<?php

namespace Al3x5\xBot\Entities;

/**
 * InputPaidMedia Entity
 */
class InputPaidMedia extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): InputPaidMediaPhoto|InputPaidMediaVideo
    {
        return $this->propertys['type'] == 'photo'
            ? new InputPaidMediaPhoto($this->propertys)
            : new InputPaidMediaVideo($this->propertys);
    }
}
