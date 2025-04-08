<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Entities\Message;

trait CommandHandler
{
    use ConversationHandler;
    
    private array $commands;

    /**
     * Establece los commands
     */
    public function setCommands(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new \RuntimeException("Error: '$filename' file does not exist.");
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
            throw new \RuntimeException("Error: Command '$default' does not exist.");
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
        // Eliminar la barra inicial y cualquier mención al bot
        $text = preg_replace(
            '/^\/([a-zA-Z0-9_]+)(@[\w]+)?/',
            '$1',
            $this->getMessage()->getText()
        );

        // Separar el comando de los parámetros
        $parts = explode(' ', $text);
        $key = $parts[0]; // El primer elemento es el comando
        $params = array_slice($parts, 1); // El resto son los parámetros

        $this->handle($key, $params);
    }

    /**
     * Manejador de mensajes
     */
    private function handleMessage(): void
    {
        if ($this->isTalking()) {
            $this->getConversation();
            return;
        }

        $this->handle(
            $this->getCommand(
                $this->getMessage()->getText(),
                '/generic'
            )
        );
    }

    /**
     *  Manejador de eventos
     */
    private function handle(string $key, array $params = []): void
    {
        $className = $this->getCommand("/$key", '/generic');

        if (!class_exists($className)) {
            throw new \RuntimeException("Error: Class '$className' does not exist.");
        }

        $command = new $className($this->update);
        $command->execute(...$params);
    }

    /**
     * Accede a la entidad Message
     */
    public function getMessage(): Message
    {
        return $this->update->getMessage();
    }
}
