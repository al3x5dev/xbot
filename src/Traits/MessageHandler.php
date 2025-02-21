<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Telegram;

trait MessageHandler
{

    public ?Update $update = null;

    public function getChatId()//: int
    {
        return match ($this->update->type()) {
            'message' => $this->update->get('message')->get('chat')->id,
            'callback_query' => $this->update->get('callback_query')->message->chat->id,
        };
    }

    public function getFirstName(): string
    {
        return $this->update->get('message')->get('from')->first_name;
    }

    /**
     * Responder mensajes
     * 
     * $message->reply("message_text", [
     *    "disable_notification" => true
     * ]);
     */
    public function reply(string $message, array $optional_parameters = []): Telegram
    {
        $data = array_merge(
            [
                'chat_id' => $this->getChatId(),
                'text' => $message,
            ],
            $optional_parameters
        );
        return $this->sendMessage($data);
    }

    /**
     * Verifica Si es un usuario con rivilegios de administrador
     */
    private function isAdmin(): bool
    {
        return in_array($this->update->get('message')->chat->id, Config::get('admins'));
    }
}
