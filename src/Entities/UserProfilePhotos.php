<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UserProfilePhotos Entity
 * @property int $total_count
 * @property PhotoSize[] $photos
 */
class UserProfilePhotos extends Entity
{
    protected function setEntities(): array
    {
        return [
            'photos' => [PhotoSize::class],
        ];
    }
}
