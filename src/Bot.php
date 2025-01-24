<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\ExceptionHandler;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Traits\CommandHandlers;
use Al3x5\xBot\Traits\ConversationHandlers;
use Al3x5\xBot\Traits\MessageHandlers;
use Mk4U\Http\Request;

class Bot
{
    public const NAME = 'xBot';

    public const VERSION = '1.x.x';

    use CommandHandlers,
        ConversationHandlers,
        MessageHandlers;

    /**
     * Inicializa el bot
     */
    public function __construct(array $cfg)
    {
        Config::init($cfg);
        ExceptionHandler::start();

        $this->addCommands(Config::get('handler'));
    }

    /**
     * Ejecuta el metodo especificado de la API de Telegram
     */
    public function __call($name, $arguments): Telegram
    {
        $api = new Telegram($name, $arguments[0] ?? []);
        return $api->send();
    }

    private function getUpdate(): void
    {
        $data = (Request::create())->jsonData(true);

        if (empty($data)) {
            throw new xBotException("Update empty! The webhook should not be called manually, only by Telegram.");
        }

        if (Config::get('dev')) {
            Events::logger('development', 'update.log', json_encode($data));
        }

        $this->update = new Update($data);
    }

    /**
     * Obtiene el objeto Update de Telegram y procesa los mensajes
     */
    public function run(): Telegram
    {
        $this->getUpdate();

        return match ($this->update->type()) {
            'message' => $this->resolveMessage($this->update->get('message')),
            'callback_query' => $this->resolveCallback($this->update->get('callback_query')),
            default => throw new xBotException(
                sprintf('Unsupported update type: %s', $this->update->type())
            )
        };
    }

    /**
     * Resuelve mensaje
     */
    private function resolveMessage(Message $message): Telegram
    {
        if ($message->isCommand()) {
            return $this->handleCommand($message);
        }
        //mensage generico 
        return $this->handleGenericMessage($message);
    }

    /**
     * Resuelve Callback Query
     */
    private function resolveCallback(CallbackQuery $callback): Telegram
    {
        $obj='Al3x5\Tests\Commands\\'.$callback->get('data');
        return (new $obj($this,$callback->get('message')))->executeCallback();
    }
}
