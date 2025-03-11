<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\CallbackQuery;

/**
 * Callbacks class
 */
abstract class Callbacks
{
    public function __construct(protected Bot $bot, protected CallbackQuery $callback)
    {
        $this->bot = $bot;
        $this->callback = $callback;
    }

    /**
     * Ejecuta callback
     */
    abstract public function execute(): Telegram;
}
