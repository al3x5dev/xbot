<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Exceptions\xBotException;

trait MessageHandler
{
    use ConversationHandler;

    private array $commands;

    /**
     * Establece los commands
     */
    public function setCommands(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new xBotException("Error: '$filename' file does not exist.");
        }

        $this->commands = json_decode(file_get_contents($filename), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Error: Invalid JSON in '$filename'.");
        }
    }

    /**
     * Devuelve commands especifico
     */
    public function getCommand(string $name, ?string $default = null): string
    {
        // Verificar si el comando existe
        if ($this->hasCommand($name)) {
            return $this->commands[$name];
        }

        // Verifica si existe o no /help 
        if (!$this->hasCommand($default)) {
            throw new xBotException("Error: Command '$default' does not exist.");
        }

        return $this->commands[$default];
    }

    /**
     * Verifica si esta definido el comando
     */
    private function hasCommand(string $name): bool
    {
        return key_exists($name, $this->commands);
    }

    /**
     * Manejador de comandos
     */
    private function handleCommand(): void
    {
        // Separar el comando de los parámetros
        $parts = explode(' ', $this->getMessage()->getText());

        // Eliminar cualquier mención al bot
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

    /**
     * Manejador de mensajes
     */
    private function handleMessage(): void
    {
        $this->handle(
            $this->getCommand(
                trim($this->getMessage()->getText(), '\\') ?? '',
                '/generic'
            )
        );
    }

    /**
     *  Manejador de eventos
     */
    private function handle(string $className, array $args = []): void
    {
        classValidator($className, Commands::class, 'Command');

        $command = new $className($this->update);
        $command->setArgs($args);
        $command->execute();
    }

    /**
     * Accede a la entidad Message
     */
    public function getMessage(): Message
    {
        return $this->update->getMessage();
    }
}
