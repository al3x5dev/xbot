<?php

namespace Al3x5\xBot\Telegram\Keyboards\Builder;

use Al3x5\xBot\Entities\ReplyKeyboardMarkup;

class ReplyKeyboard
{
    private array $rows = [];
    private array $options = [];

    public function row(array $buttons): self
    {
        // Verifica de que cada botón esté construido
        $builtButtons = array_map(function($button) {
            return $button instanceof ReplyButton ? $button->build() : $button;
        }, $buttons);

        $this->rows[] = $builtButtons;
        return $this;
    }

    public function addRow(array $buttons): self
    {
        return $this->row($buttons);
    }

    public function persistent(bool $value = true): self
    {
        $this->options['is_persistent'] = $value;
        return $this;
    }

    public function resize(bool $value = true): self
    {
        $this->options['resize_keyboard'] = $value;
        return $this;
    }

    public function oneTime(bool $value = true): self
    {
        $this->options['one_time_keyboard'] = $value;
        return $this;
    }

    public function placeholder(string $text): self
    {
        $this->options['input_field_placeholder'] = $text;
        return $this;
    }

    public function selective(bool $value = true): self
    {
        $this->options['selective'] = $value;
        return $this;
    }

    public function build(): ReplyKeyboardMarkup
    {
        $data = ['keyboard' => $this->rows] + $this->options;
        return new ReplyKeyboardMarkup($data);
    }

    public static function button(string $text): ReplyButton
    {
        return new ReplyButton($text);
    }
}