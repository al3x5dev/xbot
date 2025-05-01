<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Traits\Responder;

/**
 * Callbacks class
 */
abstract class Callbacks
{
    public ?CallbackQuery $callback;
    public ?Message $message;


    use Responder;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
        $this->callback = $update->getCallbackQuery();
        $this->message = $this->callback->getMessage();
    }

    /**
     * Ejecuta callback
     */
    abstract public function execute(): void;
}
