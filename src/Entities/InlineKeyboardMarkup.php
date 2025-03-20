<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineKeyboardMarkup class
 * 
 * @property InlineKeyboardButton[][] $inline_keyboard;
 */
class InlineKeyboardMarkup extends Base
{
    public function getEntities(): array
    {
        return [
            'inline_keyboard' => InlineKeyboardButton::class,
        ];
    }
}