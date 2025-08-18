<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Gift Entity
 * @property string $id
 * @property Sticker $sticker
 * @property int $star_count
 * @property int $upgrade_star_count
 * @property int $total_count
 * @property int $remaining_count
 * @property Chat $publisher_chat
 */
class Gift extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
            'publisher_chat' => Chat::class,
        ];
    }
}
