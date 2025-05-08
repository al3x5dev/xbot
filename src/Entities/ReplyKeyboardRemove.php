<?php

namespace Al3x5\xBot\Entities;

/**
 * ReplyKeyboardRemove Entity
 * @property bool $remove_keyboard;
 * @property bool $selective;
 */
class ReplyKeyboardRemove extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
