<?php

namespace Al3x5\xBot\Entities;

/**
 * PreparedInlineMessage Entity
 * @property string $id;
 * @property int $expiration_date;
 */
class PreparedInlineMessage extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
