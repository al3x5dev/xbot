<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\MessageHandler;

/**
 * Commands class
 */
abstract class Commands
{
    public ?Message $message;
    use MessageHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
        $this->message = $update->getMessage();
    }

    /**
     * Ejecuta el comando
     */
    abstract public function execute(...$params): void;

    /**
     * Help command
     */
    abstract public function getDescription(): string;
}
