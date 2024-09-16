<?php

namespace Al3x5\Tests\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Keyboard;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
class HelloCommand extends Commands
{
    public function execute(): Telegram
    {
        return $this->bot->sendPhoto([
            'chat_id' => $this->bot->getChatId(),
            'photo' => 'https://i.pinimg.com/736x/8c/1c/2e/8c1c2ec143a3ab9229014479fd83c437.jpg',
            'caption' => '¡Bienvenido *'. $this->bot->getFirstName() .'* al Bot de Apuestas de Telegram\! 🎉'.PHP_EOL.PHP_EOL.
            'Este bot te permitirá realizar apuestas en diferentes eventos 🃏🎰🎯🎱⚽️',
            'reply_markup' => Keyboard::inline([
                [
                    ['text' => '🎮 Jugar', 'callback_data' => 'GameCommand']
                ],
                [
                    ['text' => '💵 Banca', 'callback_data' => 'hello']
                ],
                [
                    ['text' => '🛟 Ayuda', 'callback_data' => 'hello']
                ]
            ])
        ]);
    }
}
