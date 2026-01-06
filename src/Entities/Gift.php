<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Gift Entity
 * @property string $id
 * @property Sticker $sticker
 * @property int $star_count
 * @property int $upgrade_star_count
 * @property bool $is_premium
 * @property bool $has_colors
 * @property int $total_count
 * @property int $remaining_count
 * @property int $personal_total_count
 * @property int $personal_remaining_count
 * @property GiftBackground $background
 * @property int $unique_gift_variant_count
 * @property Chat $publisher_chat
 */
class Gift extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
            'background' => GiftBackground::class,
            'publisher_chat' => Chat::class,
        ];
    }
}
