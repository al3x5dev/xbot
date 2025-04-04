<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\ConversationHandler;
use Al3x5\xBot\Traits\MessageHandler;

/**
 * Conversation class
 */
abstract class Conversations
{
    use ConversationHandler,
        MessageHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    /**
     * Establece nueva conversacion
     */
    public function say(
        string $message,
        string $conversation,
        ?string $next = null
    ): Telegram {
        $this->startConversation($conversation, $next);
        return $this->reply($message);
        //return $this;
    }

    /**
     * Ejecuta la conversacion
     */
    abstract public function execute(array $params = []): void;
}
