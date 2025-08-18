<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostApprovalFailed Entity
 * @property Message $suggested_post_message
 * @property SuggestedPostPrice $price
 */
class SuggestedPostApprovalFailed extends Entity
{
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
            'price' => SuggestedPostPrice::class,
        ];
    }
}
