<?php

namespace Al3x5\xBot\Entities;

/**
 * PaidMediaPurchased Entity
 * @property User $from;
 * @property string $paid_media_payload;
 */
class PaidMediaPurchased extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
        ];
    }
}
