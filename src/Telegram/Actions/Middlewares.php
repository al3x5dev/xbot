<?php

namespace Al3x5\xBot\Telegram\Actions;

use Al3x5\xBot\Telegram\Actions\Traits\MethodsHandler;
use Al3x5\xBot\Telegram\Entities\Update;

abstract class Middlewares
{
    protected Update $update;
    use MethodsHandler;

    public function __construct(Update $update)
    {
        $this->update = $update;
    }

    abstract public function handle(\Closure $next);

    protected function abort(?string $message = null, array $params = []): bool
    {
        if ($message !== null && $message !== '') {
            $this->reply($message, $params);
        }

        return false;
    }
}
