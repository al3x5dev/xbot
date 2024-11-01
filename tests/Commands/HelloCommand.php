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
        return $this->bot->reply('Hola 👋 ['.$this->message->get('from')->first_name.'](tg://user?id='.$this->message->get('from')->id.')',[
            'reply_to_message_id' => 11, // Responde al mensaje original
        'message_thread_id' => 11 // Especifica el ID del hilo
        ]);
    }
}
