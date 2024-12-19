<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

/**
 * Help class
 */
final class Help extends Commands
{
    public function execute(): Telegram
    {
        return $this->bot->reply('Help message');
    }
}
