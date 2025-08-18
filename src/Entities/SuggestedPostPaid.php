<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostPaid Entity
 * @property Message $suggested_post_message
 * @property string $currency
 * @property int $amount
 * @property StarAmount $star_amount
 */
class SuggestedPostPaid extends Entity
{
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
            'star_amount' => StarAmount::class,
        ];
    }
}
