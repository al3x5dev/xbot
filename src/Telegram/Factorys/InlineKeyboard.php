<?php

namespace Al3x5\xBot\Telegram\Factorys;

use Al3x5\xBot\Telegram\Entities\InlineKeyboardMarkup;
use Al3x5\xBot\Telegram\Factorys\Keyboard\AddRowTrait;

class InlineKeyboard
{
    private array $rows = [];

    use AddRowTrait;

    public function build(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(['inline_keyboard' => $this->rows]);
    }
}
