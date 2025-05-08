<?php

namespace Al3x5\xBot\Entities;

/**
 * Gift Entity
 * @property string $id;
 * @property Sticker $sticker;
 * @property int $star_count;
 * @property int $upgrade_star_count;
 * @property int $total_count;
 * @property int $remaining_count;
 */
class Gift extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
