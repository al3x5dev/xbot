<?php
namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
final class Start extends Commands
{
    public function execute(array $params=[]): Telegram
    {
        return $this->bot->reply('Start command executed');
    }
}
