<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReplyKeyboardMarkup Entity
 * @property KeyboardButton[] $keyboard
 * @property bool $is_persistent
 * @property bool $resize_keyboard
 * @property bool $one_time_keyboard
 * @property string $input_field_placeholder
 * @property bool $selective
 */
class ReplyKeyboardMarkup extends Entity
{
    protected function setEntities(): array
    {
        return [
            'keyboard' => [KeyboardButton::class],
        ];
    }
}
