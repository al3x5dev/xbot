<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaPurchased Entity
 * @property User $from
 * @property string $paid_media_payload
 */
class PaidMediaPurchased extends Entity
{
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
        ];
    }
}
