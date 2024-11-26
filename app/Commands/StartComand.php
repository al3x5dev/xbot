<?php
namespace App\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
final class StartCommand extends Commands
{
    public function execute(): Telegram
    {
        return $this->bot->reply('Start command executed');
    }
}
