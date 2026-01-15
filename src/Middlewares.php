<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\Responder;

/**
 * Middleware class
 */
abstract class Middlewares
{
    protected Update $update;
    use Responder;

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
