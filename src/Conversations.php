<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\ConversationHandler;
use Al3x5\xBot\Traits\BotActions;

/**
 * Conversation class
 */
abstract class Conversations
{
    protected array $end = [];

    use ConversationHandler,
        BotActions;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    /**
     * Inicia una conversacion con el usuario
     */
    protected function setStep(string $step): void
    {
        Config::get('cache')->set(
            $this->getConversationIdentifier(),
            [
                'conversation' => static::class,
                'step' => $step,
                'end' => $this->getData('end', $this->end)
            ]
        );
    }

    /**
     * Palabras para cancelar
     */
    protected function end(string ...$words): void
    {
        $this->end = array_map('mb_strtolower', $words);
    }

    /**
     * Establece nueva conversacion
     */
    public function ask(
        string $message,
        string $step
    ) {
        $this->reply($message);
        $this->setStep($step);
    }

    /**
     * Inicia la conversación
     */
    abstract public function start(): void;

    /**
     * Mensaje de error ante fallas
     */
    public function fallback(): void {}
}
