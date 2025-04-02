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

        $entity = match ($type) {
            'callback_query' => $this->update->__get($type)->getMessage(),
            'message' => $this->update->__get($type),
        };
        return $entity->getChat()->getId() . $entity->getFrom()->getId();
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
    private function getConversation(): void
    {
        $data = Config::get('storage')->get(
            $this->getConversationIdentifier()
        );

        if (is_null($data)) {
            return;
        }

        $conversation = new $data['conversation']($this);

        call_user_func([$conversation, $data['next']]);
    }

    /**
     * Inicia una conversacion con el usuario
     */
    public function startConversation(string $obj, ?string $next = null): void
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
