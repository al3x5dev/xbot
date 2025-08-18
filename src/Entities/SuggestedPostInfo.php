<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostInfo Entity
 * @property string $state
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'price' => SuggestedPostPrice::class,
        ];
    }
}
