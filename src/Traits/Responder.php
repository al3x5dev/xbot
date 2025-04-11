<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Telegram;

trait Responder
{

    protected static array $cachedCommands = [];

    /**
     * Métodos de Respuesta e Interacción
     * 
     * Ejecuta el metodo especificado de la API de Telegram
     */
    public function __call($name, $arguments): Telegram
    {
        $api = new Telegram($name, $arguments[0] ?? []);
        return $api->send();
    }

    /**
     * Responder mensajes
     * 
     * $message->reply("message_text", [
     *    "disable_notification" => true
     * ]);
     */
    public function reply(string $message, array $params = []): Telegram
    {
        if (!$active = $this->getActiveEntity()) {
            throw new \RuntimeException("No active entity found.");
        }

        $chat = match (true) {
            $active instanceof Message => $active->getChat(),
            $active instanceof CallbackQuery => $active->getMessage()->getChat(),
            default => throw new \RuntimeException("Unsupported entity type."),
        };

        return $this->sendMessage(
            array_merge(
                [
                    'chat_id' => $chat->getId(),
                    'text' => $message,
                ],
                $params
            )
        );
    }

    /**
     * Verifica Si es un usuario con privilegios de administrador
     */
    public function isAdmin(): bool
    {
        return in_array(
            $this->getActiveEntity()->getFrom()->getId(),
            Config::get('admins'),
            true
        );
    }

    /**
     * Obtiene entidades de Update
     */
    public function getActiveEntity(): mixed
    {
        return $this->update->__get($this->update->type());
    }

    /**
     * Obtener todos los comandos desde el JSON.
     */
    protected function getAllCommands(): array
    {
        if (empty(self::$cachedCommands)) {
            $json = json_decode(file_get_contents(base('storage/commands.json')), true);
            self::$cachedCommands = is_array($json) ? $json : throw new \RuntimeException("Error in commands.json: " . json_last_error_msg());
        }
        return self::$cachedCommands;
    }

    /**
     * Ejecuta el comando dentro de otro
     */
    public function executeCommand(string $command, ...$params): void
    {
        if (!key_exists($command, self::$cachedCommands)) {
            throw new \InvalidArgumentException("Error: Command '$command' does not exist.");
        }

        (new self::$cachedCommands[$command]($this->update))->execute(...$params);
    }
}
