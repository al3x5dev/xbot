<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessIntro Entity
 * @property string $title
 * @property string $message
 * @property Sticker $sticker
 */
class BusinessIntro extends Entity
{
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
