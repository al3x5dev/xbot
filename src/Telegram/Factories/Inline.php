<?php

namespace Al3x5\xBot\Telegram\Factories;

use Al3x5\xBot\Telegram\Entities\InlineKeyboardMarkup;
use Al3x5\xBot\Telegram\Factories\Keyboard\AddRowTrait;

class Inline
{
    private array $rows = [];

    use AddRowTrait;

    public function build(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(['inline_keyboard' => $this->rows]);
    }
}
