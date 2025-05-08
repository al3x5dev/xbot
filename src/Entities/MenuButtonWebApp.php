<?php

namespace Al3x5\xBot\Entities;

/**
 * MenuButtonWebApp Entity
 * @property string $type;
 * @property string $text;
 * @property WebAppInfo $web_app;
 */
class MenuButtonWebApp extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
