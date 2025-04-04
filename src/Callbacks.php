<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\MessageHandler;

/**
 * Callbacks class
 */
abstract class Callbacks
{
    public ?CallbackQuery $callback;

    use MessageHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
        $this->callback = $update->getCallbackQuery();
    }

    /**
     * Ejecuta callback
     */
    abstract public function execute(): void;

    /**
     * Respuesta de callback
     */
    public function answerCallbackQuery(): Telegram
    {
        return $this->answerCallbackQuery([
            'callback_query_id' => $this->callback->getId()/*
text 	String 	
show_alert 	Boolean 	
url 	String 	
cache_time Integer */
        ]);
    }
}
