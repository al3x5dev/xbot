<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineKeyboardMarkup Entity
 * @property InlineKeyboardButton[] $inline_keyboard
 */
class InlineKeyboardMarkup extends Entity
{
    protected function setEntities(): array
    {
        return [
            'inline_keyboard' => [InlineKeyboardButton::class],
        ];
    }
}
