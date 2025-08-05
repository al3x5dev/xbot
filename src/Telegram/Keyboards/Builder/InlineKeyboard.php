<?php

namespace Al3x5\xBot\Telegram\Keyboards\Builder;

use Al3x5\xBot\Entities\InlineKeyboardMarkup;

class InlineKeyboard
{
    private array $rows = [];

    public function row(array $buttons): self
    {
        // Verifica de que cada botón esté construido
        $builtButtons = array_map(function($button) {
            return $button instanceof InlineButton ? $button->build() : $button;
        }, $buttons);

        $this->rows[] = $builtButtons;
        return $this;
    }

    public function addRow(array $buttons): self
    {
        return $this->row($buttons);
    }

    public function build(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(['inline_keyboard' => $this->rows]);
    }

    public static function button(string $text) : InlineButton
    {
        return new InlineButton($text);
    }
}
