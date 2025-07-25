<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ForceReply Entity
 * @property bool $force_reply
 * @property string $input_field_placeholder
 * @property bool $selective
 */
class ForceReply extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
