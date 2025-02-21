<?php

namespace Al3x5\xBot\Traits;

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
    public function getCallback(string $action) : string
    {
        return $this->callbacks[$action];
    }
}
