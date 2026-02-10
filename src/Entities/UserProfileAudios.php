<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UserProfileAudios Entity
 * @property int $total_count
 * @property Audio[] $audios
 */
class UserProfileAudios extends Entity
{
    protected function setEntities(): array
    {
        return [
            'audios' => [Audio::class],
        ];
    }
}
