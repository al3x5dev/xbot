<?php

namespace Al3x5\xBot\Entities;

/**
 * LoginUrl class
 * 
 * @property string $url;
 * @property string $forward_text;
 * @property string $bot_username;
 * @property bool $request_write_access;
 */
class LoginUrl extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}