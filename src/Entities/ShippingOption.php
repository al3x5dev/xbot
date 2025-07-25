<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ShippingOption Entity
 * @property string $id
 * @property string $title
 * @property LabeledPrice[] $prices
 */
class ShippingOption extends Entity
{
    protected function setEntities(): array
    {
        return [
            'prices' => [LabeledPrice::class],
        ];
    }
}
