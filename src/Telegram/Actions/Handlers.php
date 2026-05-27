<?php

namespace Al3x5\xBot\Telegram\Actions;

use Al3x5\xBot\Telegram\Actions\Traits\MethodsHandler;
use Al3x5\xBot\Telegram\Entities\Update;

abstract class Handlers
{
    use MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    abstract public function execute(): void;

}
