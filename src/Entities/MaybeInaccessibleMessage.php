<?php

namespace Al3x5\xBot\Entities;

/**
 * MaybeInaccessibleMessage Entity
 */
class MaybeInaccessibleMessage extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): Message|InaccessibleMessage
    {
        return $this->hasProperty('from')
            ? new Message($this->propertys)
            : new InaccessibleMessage($this->propertys);
    }
}
