<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\Responder;

/**
 * Commands class
 */
abstract class Commands
{
    public ?Message $message;
    use Responder;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
        $this->message = $update->getMessage();
    }

    /**
     * Devuelve lista de comandos
     */
    public function getCommandsList(): array
    {
        $commands = [];

        foreach ($this->getAllCommands() as $name => $className) {
            $commands[$name] = (new $className($this->update))->getDescription();
        }

        return $commands;
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
