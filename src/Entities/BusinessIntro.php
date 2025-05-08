<?php

namespace Al3x5\xBot\Entities;

/**
 * BusinessIntro Entity
 * @property string $title;
 * @property string $message;
 * @property Sticker $sticker;
 */
class BusinessIntro extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
