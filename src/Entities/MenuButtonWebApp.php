<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MenuButtonWebApp Entity
 * @property string $type
 * @property string $text
 * @property WebAppInfo $web_app
 */
class MenuButtonWebApp extends Entity
{
    protected function setEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
