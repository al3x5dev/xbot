<?php

namespace Al3x5\xBot\Entities;

/**
 * ReplyKeyboardMarkup Entity
 * @property \ArrayOfKeyboardButton[] $keyboard;
 * @property bool $is_persistent;
 * @property bool $resize_keyboard;
 * @property bool $one_time_keyboard;
 * @property string $input_field_placeholder;
 * @property bool $selective;
 */
class ReplyKeyboardMarkup extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'keyboard'=>[KeyboardButton::class]
        ];
    }
}
