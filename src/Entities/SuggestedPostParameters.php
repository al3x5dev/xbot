<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostParameters Entity
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostParameters extends Entity
{
    protected function setEntities(): array
    {
        return [
            'price' => SuggestedPostPrice::class,
        ];
    }
}
