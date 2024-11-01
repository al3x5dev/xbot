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
        return $this->bot->sendPhoto([
            'chat_id' => $this->bot->getChatId(),
            'photo' => 'https://i.pinimg.com/736x/8c/1c/2e/8c1c2ec143a3ab9229014479fd83c437.jpg',
            'caption' => '¡Bienvenido *' . $this->bot->getFirstName() . '* al Bot de Apuestas de Telegram\! 🎉' . PHP_EOL . PHP_EOL .
                'Este bot te permitirá realizar apuestas en diferentes eventos 🃏🎰🎯🎱⚽️',
            'reply_markup' => Keyboard::inline([
                [
                    [
                        'text' => '🚀 Iniciar', 
                        'url' => 'https://t.me/Al3x5Bot/testerapmy'
                    ]
                ],
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

    public function executeCallback(): Telegram
    {
        return $this->bot->sendMessage([
            'chat_id' => -1002331361730,
            'text' => '¡Hola! 🤖'
        ]);

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
