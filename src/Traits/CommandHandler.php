<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Telegram;

trait CommandHandler
{
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
    public function getCommands(string $name, ?string $default = null): string
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
    private function handleCommand(Message $message): Telegram
    {
        // Eliminar la barra inicial y cualquier mención al bot
        $text = preg_replace('/^([a-zA-Z0-9_]+)(@[\w]+)?/', '$1', $message->get('text'));
        $text = rtrim($text, '/');

        // Separar el comando de los parámetros
        $parts = explode(' ', $text);
        $key = $parts[0]; // El primer elemento es el comando
        $params = array_slice($parts, 1); // El resto son los parámetros

        return $this->handle($key, $message, $params);
    }

    /**
     * Manejador de mensajes
     */
    private function handleMessage(Message $message): Telegram
    {
        if ($this->isTalking()) {
            return $this->getConversation();
        }

        return $this->handle(
            $this->getCommands($message->get('text')),
            $message
        );
    }

    /**
     * 
     */
    private function handle(string $key, Message $message, array $params = []): Telegram
    {
        $className = $this->getCommand($key, '/help');

        if (!class_exists($className)) {
            throw new \RuntimeException("Error: Class '$className' does not exist.");
        }

        $command = new $className($this, $message);
        return $command->execute(...$params);
    }

    /**
     * Ejecuta el comando dentro de otro
     */
    public function executeCommand(string $command): Telegram
    {
        return (new $this->commands[$command](
            $this,
            $this->update->get('message')
        )
        )->execute();
    }
}
