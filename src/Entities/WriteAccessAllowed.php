<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * WriteAccessAllowed Entity
 * @property bool $from_request
 * @property string $web_app_name
 * @property bool $from_attachment_menu
 */
class WriteAccessAllowed extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
