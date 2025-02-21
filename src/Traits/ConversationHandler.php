<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Exceptions\xBotException;

trait ConversationHandler
{
    /**
     * Obtiene el identificador de la conversacion
     */
    private function getConversationIdentifier(): string
    {
        $type = $this->update->type();

        if (is_null($type)) {
            throw new xBotException(sprintf('Unsupported update type: %s', $type));
        }

        $entity = $this->update->get($type);
        return $entity->chat->id . $entity->from->id;
    }

    /**
     * Verificar si hay una conversacion pendiente
     */
    private function isTalking(): bool
    {
        return  Config::get('storage')->has(
            $this->getConversationIdentifier()
        );
    }

    /**
     * Obtiene flujo de la conversacion y lo ejecuta
     */
    private function getConversation(): mixed
    {
        $expired = Config::get('storage')->isExpired(
            $this->getConversationIdentifier()
        );
        if ($expired) {
            Config::get('storage')->delete(
                $this->getConversationIdentifier()
            );

            return null;
           // return $this->executeCommand('/game');
        }
        $data = Config::get('storage')->get(
            $this->getConversationIdentifier()
        );

        $conversation = new $data['conversation']($this);

        return call_user_func([$conversation, $data['next']]);
    }

    /**
     * Inicia una conversacion con el usuario
     */
    public function startConversation(string $obj, string $next = null): void
    {
        Config::get('storage')->set(
            $this->getConversationIdentifier(),
            [
                'conversation' => $obj,
                'next' => $next ?? 'execute'
            ]
        );
    }

    /**
     * Detiene la conversacion con ese usuario
     */
    public function stopConversation(): void
    {
        Config::get('storage')->delete(
            $this->getConversationIdentifier()
        );
    }
}
