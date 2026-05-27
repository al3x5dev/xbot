<?php

namespace Al3x5\xBot\Telegram\Actions;

use Al3x5\xBot\Telegram\Actions\Traits\MethodsHandler;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\Update;

abstract class Commands
{
    public ?Message $message;
    private array $args = [];
    use MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->message = $update->getMessage();
    }

    protected function getCommandsList(): array
    {
        $commands = [];

        foreach ($this->getAllCommands() as $name => $className) {
            $commands[$name] = $className::description();
        }

        return $commands;
    }

    final public function setArgs(array $args): void
    {
        $this->args = $args;
    }

    protected function arg(int $index, mixed $default = null): mixed
    {
        return $this->args[$index] ?? $default;
    }

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


    abstract public function execute(): void;

    abstract public static function description(): string;
}
