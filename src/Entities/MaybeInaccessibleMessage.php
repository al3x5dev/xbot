<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MaybeInaccessibleMessage Entity
 */
class MaybeInaccessibleMessage extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return $this->hasProperty('from') 
            ? new Message($this->properties)
            : new InaccessibleMessage($this->properties);
    }
}
