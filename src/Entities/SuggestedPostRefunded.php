<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * SuggestedPostRefunded Entity
 * @property Message $suggested_post_message
 * @property string $reason
 */
class SuggestedPostRefunded extends Entity
{
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
        ];
    }
}
