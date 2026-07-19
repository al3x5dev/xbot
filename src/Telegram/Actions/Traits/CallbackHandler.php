<?php

namespace Al3x5\xBot\Telegram\Actions\Traits;

use Al3x5\xBot\Telegram\Actions\Callbacks;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;

trait CallbackHandler
{
    private array $callbacks;

    use ConversationHandler;

    public function setCallbacks(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new \RuntimeException("Error: '$filename' file does not exist.");
        }

        $this->callbacks = json_decode(file_get_contents($filename), true);
    }

    public function handleCallback(): void
    {
        $action = $this->getCallbackQuery()->getData();
        $parts = [];

        if (!$this->hasCallback($action)) {
            $parts = explode('|', $action, 2);
            $key = $parts[0];
            if (!$this->hasCallback($key)) {
                throw new \RuntimeException("Error: Callback '$action' does not exist.");
            }
            $handlerClass = $this->callbacks[$key];
        } else {
            $handlerClass = $this->callbacks[$action];
        }

        $param = $parts[1] ?? null;

        classValidator(
            $handlerClass,
            Callbacks::class,
            'Callback'
        );

        $handler = new $handlerClass($this->update);
        if ($param !== null) {
            $handler->setParam($param);
        }
        $handler->execute();
    }

    private function hasCallback(string $name): bool
    {
        return isset($this->callbacks[$name]);
    }

    public function getCallbackQuery(): CallbackQuery
    {
        return $this->update->getCallbackQuery();
    }
}
