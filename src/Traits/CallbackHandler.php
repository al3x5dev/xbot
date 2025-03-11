<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Telegram;

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
    public function handleCallback(CallbackQuery $callback): Telegram
    {
        // Verifica si existe
        if (!$this->hasCallback($action = $callback->getData())) {
            throw new \RuntimeException("Error: Callback '$action' does not exist.");
        }

        return (new $this->callbacks[$action]($this,$callback))->execute();
    }

    /**
     * Verifica si esta definido el callback
     */
    private function hasCallback(string $name): bool
    {
        return key_exists($name, $this->callbacks);
    }
}
