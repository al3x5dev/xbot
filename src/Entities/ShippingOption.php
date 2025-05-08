<?php

namespace Al3x5\xBot\Entities;

/**
 * ShippingOption Entity
 * @property string $id;
 * @property string $title;
 * @property \LabeledPrice[] $prices;
 */
class ShippingOption extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
