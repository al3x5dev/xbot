<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Message;

/**
 * Callbacks class
 */
abstract class Callbacks
{
    public function __construct(protected Bot $bot, protected Message $message)
    {
        $this->bot = $bot;
        $this->message = $message;
    }

    /**
     * Ejecuta callback
     */
    abstract public function execute(array $params=[]): Telegram;
}
