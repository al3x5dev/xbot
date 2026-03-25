<?php

namespace Al3x5\xBot\Telegram\Factorys\Keyboard;

interface ButtonInterface
{
    public static function make(string $text): self;
}
