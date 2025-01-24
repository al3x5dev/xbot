<?php

namespace Al3x5\xBot;

/**
 * Conversation class
 */
abstract class Conversation
{
    public function __construct(protected Bot $bot)
    {
        $this->bot = $bot;
    }

    /**
     * Establece nueva conversacion
     */
    public function say(
        string $message,
        string $conversation,
        string $next = null
    ): Telegram {
        $this->bot->startConversation($conversation, $next);
        return $this->bot->reply($message);
        //return $this;
    }

    /**
     * Ejecuta la conversacion
     */
    abstract public function execute(): Telegram;
}
