<?php

namespace Al3x5\xBot\Entities;

/**
 * ForceReply Entity
 * @property bool $force_reply;
 * @property string $input_field_placeholder;
 * @property bool $selective;
 */
class ForceReply extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
