<?php

namespace Al3x5\xBot\Telegram\Factorys;

use Al3x5\xBot\Telegram\Entities\ForceReply;
use Al3x5\xBot\Telegram\Entities\ReplyKeyboardRemove;

class Keyboard
{
    public static function inline(): InlineKeyboard
    {
        return new InlineKeyboard();
    }

    public static function reply(): ReplyKeyboard
    {
        return new ReplyKeyboard();
    }

    public static function remove(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(['remove_keyboard' => true]);
    }

    public static function forceReply(
        bool $selective = false,
        string $placeholder = ''
    ): ForceReply {
        return new ForceReply([
            'force_reply' => true,
            'selective' => $selective,
            'input_field_placeholder' => $placeholder
        ]);
    }
}
