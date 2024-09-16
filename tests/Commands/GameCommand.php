<?php

namespace Al3x5\Tests\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Keyboard;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
class GameCommand extends Commands
{
    public function execute(): Telegram
    {
        return $this->bot->reply('Soy un comando');
    }

    public function executeCallback(): Telegram
    {
        return $this->bot->reply('Listo para jugar', [
            'reply_markup' => Keyboard::inline([
                [
                    ['text' => 'Si', 'callback_data' => 'play'],
                    ['text' => 'No', 'callback_data' => 'exit']
                ]
            ])
        ]);
    }
}
