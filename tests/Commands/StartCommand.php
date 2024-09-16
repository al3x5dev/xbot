<?php

namespace Al3x5\Tests\Commands;

use Al3x5\Tests\Conversations\HelloConversation;
use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
class StartCommand extends Commands
{
    public function execute(): Telegram
    {
        $cnv = new HelloConversation($this->bot);
        //$this->bot->startConversation(new HelloConversation($this->bot));
        $this->bot->reply('Start command executed');

        return $cnv->say('👋 Holaaaaaa, 🤔 como te llamas?', HelloConversation::class);
    }
}
