<?php

namespace Al3x5\xBot\Telegram\Actions\Traits;

use Al3x5\xBot\Telegram\Actions\Commands;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Exceptions\xBotException;

trait MessageHandler
{
    use ConversationHandler;

    private array $commands;

    public function setCommands(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new xBotException("Error: '$filename' file does not exist.");
        }

        $data = json_decode(file_get_contents($filename), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Error: Invalid JSON in '$filename'.");
        }

        $this->commands = $data;
    }

    public function getCommand(string $name, ?string $default = null): string
    {
        if ($this->hasCommand($name)) {
            return $this->commands[$name];
        }

        if (!$this->hasCommand($default)) {
            throw new xBotException("Error: Command '$default' does not exist.");
        }

        return $this->commands[$default];
    }

    private function hasCommand(string $name): bool
    {
        return key_exists($name, $this->commands);
    }

    private function handleCommand(): void
    {
        $parts = explode(' ', $this->getMessage()->getText());

        $command = preg_replace(
            '/@[a-zA-Z0-9_-]+/',
            '$1',
            $parts[0]
        );

        $this->handle(
            $this->getCommand($command, '/generic'),
            array_slice($parts, 1)
        );
    }

    private function handleMessage(): void
    {
        $this->handle(
            $this->getCommand(
                trim($this->getMessage()->getText(), '\\') ?? '',
                '/generic'
            )
        );
    }

    private function handle(string $className, array $args = []): void
    {
        classValidator($className, Commands::class, 'Command');

        $command = new $className($this->update);
        $command->setArgs($args);
        $command->execute();
    }

    public function getMessage(): Message
    {
        return $this->update->getMessage();
    }
}
