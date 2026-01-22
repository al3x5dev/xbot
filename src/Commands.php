<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\BotActions;

/**
 * Commands class
 */
abstract class Commands
{
    public ?Message $message;
    private array $args = [];
    use BotActions;

    public function __construct(protected Update $update)
    {
        $this->message = $update->getMessage();
    }

    /**
     * Devuelve lista de comandos
     */
    protected function getCommandsList(): array
    {
        $commands = [];

        foreach ($this->getAllCommands() as $name => $className) {
            $commands[$name] = $className::description();
        }

        return $commands;
    }

    /**
     * Establece argumentos
     */
    final public function setArgs(array $args): void
    {
        $this->args = $args;
    }

    /**
     * Devuelve un argumento especificado
     */
    protected function arg(int $index, mixed $default = null): mixed
    {
        return $this->args[$index] ?? $default;
    }

    /**
     * Devuelve argumentos
     */
    protected function args(?int $count = null): array
    {
        if ($count === null) {
            return $this->args;
        }

        return array_slice(
            $this->args + array_fill(0, $count, null),
            0,
            $count
        );
    }


    /**
     * Ejecuta el comando
     */
    abstract public function execute(): void;

    /**
     * Help command
     */
    abstract public static function description(): string;
}
