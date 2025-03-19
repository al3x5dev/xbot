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

    /**
     * Respuesta de callback
     */
    public function answerCallbackQuery() : Telegram
    {
        return $this->bot->answerCallbackQuery([
            'callback_query_id'=>$this->callback->getId()/*
text 	String 	
show_alert 	Boolean 	
url 	String 	
cache_time Integer */
        ]);
    }
}
