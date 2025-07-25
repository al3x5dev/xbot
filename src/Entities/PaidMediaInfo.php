<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PaidMediaInfo Entity
 * @property int $star_count
 * @property PaidMedia[] $paid_media
 */
class PaidMediaInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'paid_media' => [PaidMedia::class],
        ];
    }
}
