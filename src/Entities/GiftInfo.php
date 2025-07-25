<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * GiftInfo Entity
 * @property Gift $gift
 * @property string $owned_gift_id
 * @property int $convert_star_count
 * @property int $prepaid_upgrade_star_count
 * @property bool $can_be_upgraded
 * @property string $text
 * @property MessageEntity[] $entities
 * @property bool $is_private
 */
class GiftInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'gift' => Gift::class,
            'entities' => [MessageEntity::class],
        ];
    }
}
