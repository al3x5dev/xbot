<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Telegram;

trait MessageHandler
{

    public ?Update $update = null;


    /**
     * Responder mensajes
     * 
     * $message->reply("message_text", [
     *    "disable_notification" => true
     * ]);
     */
    public function reply(string $message, array $optional_parameters = []): Telegram
    {
        if (!$active = $this->getActiveEntity()) {
            throw new \RuntimeException("No active entity found.");
        }

        $chat = match (true) {
            $active instanceof Message => $active->getChat(),
            $active instanceof CallbackQuery => $active->getMessage()->getChat(),
            default => throw new \RuntimeException("Unsupported entity type."),
        };

        $data = array_merge(
            [
                'chat_id' => $chat->getId(),
                'text' => $message,
            ],
            $optional_parameters
        );
        return $this->sendMessage($data);
    }

    /**
     * Verifica Si es un usuario con privilegios de administrador
     */
    public function isAdmin(): bool
    {
        return in_array(
            $this->getActiveEntity()->getFrom()->getId(),
            Config::get('admins')
        );
    }

    /**
     * Obtiene entidades de Update
     */
    public function getActiveEntity(): mixed
    {
        return $this->update->__get($this->update->type());
    }
}
