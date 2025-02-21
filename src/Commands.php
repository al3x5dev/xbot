<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Message;

/**
 * Commands class
 */
abstract class Commands
{
    /** @param  string $name comando*/
    protected string $name = '';

    /** @param string $description descricion del comando */
    protected string $description = 'Command description';

    public function __construct(protected Bot $bot, protected Message $message)
    {
        $this->bot = $bot;
        $this->message = $message;
    }

    /**
     * Ejecuta el comando
     */
    abstract public function execute(...$params): Telegram;

    /**
     * Help command
     */
    abstract public function help(): void;
}
