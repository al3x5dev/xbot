<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Keyboard;
use Al3x5\xBot\Telegram;

trait CommandHandlers
{
    private array $commands = [];

    /**
     * Establece array de comandos a ejecutar
     */
    public function addCommands(array $commands): self
    {
        foreach ($commands as $key => $value) {
            if ($this->hasCommand($key)) {
                throw new xBotException("The command '$key' already exists.");
            }
            $this->commands = array_merge($this->commands, [$key => $value]);
        }
        return $this;
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

        // Verificar si el comando existe
        if (!$this->hasCommand($key)) {
            $cmd = \Al3x5\xBot\Commands\Help::class;
        } else {
            $cmd = $this->commands[$key];
        }

        // Pasar los parámetros al comando si es necesario
        return (new $cmd($this, $message))->execute($params);
    }

    /**
     * Manejador de mensajes
     */
    private function handleGenericMessage(Message $message): Telegram
    {
        if ($this->isTalking()) {
            return $this->getConversation();
        }

        return $this->reply('Mensaje generico');
    }

    /**
     * Ejecuta el comando
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
