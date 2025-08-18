<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostApproved Entity
 * @property Message $suggested_post_message
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostApproved extends Entity
{
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
            'price' => SuggestedPostPrice::class,
        ];
    }
}
