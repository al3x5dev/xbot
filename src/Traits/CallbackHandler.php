<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Entities\CallbackQuery;

trait CallbackHandler
{
    private array $callbacks;

    /**
     * Establece los callbacks
     */
    public function setCallbacks(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new \RuntimeException("Error: '$filename' file does not exist.");
        }

        $this->callbacks = json_decode(file_get_contents($filename), true);
    }

    /**
     * Devuelve callback especifico
     */
    public function handleCallback(): void
    {
        if ($this->isTalking()) {
            $this->getConversation();
            return;
        }

        $action = $this->getCallbackQuery()->getData();
        // Verifica si existe
        if (!$this->hasCallback($action)) {
            throw new \RuntimeException("Error: Callback '$action' does not exist.");
        }

        (new $this->callbacks[$action]($this->update))->execute();
    }

    /**
     * Verifica si esta definido el callback
     */
    private function hasCallback(string $name): bool
    {
        return key_exists($name, $this->callbacks);
    }

    /**
     * Accede a la entidad CallbackQuery
     */
    public function getCallbackQuery(): CallbackQuery
    {
        return $this->update->getCallbackQuery();
    }
}
