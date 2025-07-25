<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * LoginUrl Entity
 * @property string $url
 * @property string $forward_text
 * @property string $bot_username
 * @property bool $request_write_access
 */
class LoginUrl extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
