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
     * Devuelve lista de comandos
     */
    public function getCommandsList(): array
    {
        $jsonCommands = json_decode(file_get_contents('storage/commands.json'), true);

        if (!is_array($jsonCommands)) {
            throw new \RuntimeException("Error: ".json_last_error_msg());
            
        }

        $commands = [];

        foreach ($jsonCommands as $name => $className) {
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
