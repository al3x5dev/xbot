<?php

namespace Al3x5\xBot\Entities;

/**
 * OwnedGift Entity
 */
class OwnedGift extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): OwnedGiftRegular|OwnedGiftUnique
    {
        return $this->propertys['type'] == 'regular'
            ? new OwnedGiftRegular($this->propertys)
            : new OwnedGiftUnique($this->propertys);
    }
}
