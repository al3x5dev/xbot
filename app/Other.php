<?php
namespace App;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
final class Other extends Commands
{
    public function execute(): Telegram
    {
        return $this->bot->reply('Other command executed');
    }
}
