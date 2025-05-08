<?php

namespace Al3x5\xBot\Entities;

/**
 * UsersShared Entity
 * @property int $request_id;
 * @property \SharedUser[] $users;
 */
class UsersShared extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
