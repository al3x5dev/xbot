<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\Responder;

/**
 * Handlers class
 */
abstract class Handlers
{
    use Responder;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    /**
     * Ejecuta el manejador
     */
    abstract public function execute(): void;

}
