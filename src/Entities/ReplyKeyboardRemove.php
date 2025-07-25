<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReplyKeyboardRemove Entity
 * @property bool $remove_keyboard
 * @property bool $selective
 */
class ReplyKeyboardRemove extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
