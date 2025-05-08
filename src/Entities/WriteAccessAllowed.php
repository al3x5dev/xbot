<?php

namespace Al3x5\xBot\Entities;

/**
 * WriteAccessAllowed Entity
 * @property bool $from_request;
 * @property string $web_app_name;
 * @property bool $from_attachment_menu;
 */
class WriteAccessAllowed extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
