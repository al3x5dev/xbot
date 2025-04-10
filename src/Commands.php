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
     * Obtener todos los comandos
     * Obtener todos los comandos
     */
    private function getAll(): array
    {
        $jsonCommands = json_decode(file_get_contents(base('storage/commands.json')), true);

        if (!is_array($jsonCommands)) {
            throw new \RuntimeException("Error: " . json_last_error_msg());
        }

        return $jsonCommands;
    }

    /**
     * Obtener comando
     */
    private function get(?string $command = null): array|string
    {
        if (!key_exists($command, $this->getAll())) {
            throw new \InvalidArgumentException("Error: Command '$command' does not exist.");
        }

        return $this->getAll()[$command];
    }

    /**
     * Devuelve lista de comandos
     */
    public function getCommandsList(): array
    {
        $commands = [];

        foreach ($this->getAll() as $name => $className) {
            $commands[$name] = (new $className($this->update))->getDescription();
        }

        return $commands;
    }

    /**
     * Ejecuta el comando dentro de otro
     */
    public function executeCommand(string $command, ...$params): void
    {
        $className = $this->get($command);

        (new $className($this->update))->execute(...$params);
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
