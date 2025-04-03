<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\CallbackQuery;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\ExceptionHandler;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Traits\CallbackHandler;
use Al3x5\xBot\Traits\CommandHandler;
use Al3x5\xBot\Traits\ConversationHandler;
use Al3x5\xBot\Traits\MessageHandler;
use Mk4U\Http\Request;

class Bot
{
    public const NAME = 'xBot';

    public const VERSION = '2.0.0-RC1';

    use CallbackHandler,
        CommandHandler,
        ConversationHandler,
        MessageHandler;

    /**
     * Inicializa el bot
     */
    public function __construct(array $cfg)
    {
        ExceptionHandler::start();
        Config::init($cfg);
        //
        $this->setCommands('storage/commands.json');
        $this->setCallbacks('storage/callbacks.json');
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
    public function run(): void
    {
        $this->getUpdate();

        match ($this->update->type()) {
            'message' => $this->resolveMessage($this->update->getMessage()),
            'callback_query' => $this->resolveCallback($this->update->getCallbackQuery()),
            default => throw new xBotException(
                sprintf('Unsupported update type: %s', $this->update->type())
            )
        };
    }

    /**
     * Resuelve mensaje
     */
    private function resolveMessage(Message $message): void
    {
        if ($message->isCommand()) {
            $this->handleCommand($message);
            return;
        }
        //mensage generico 
        $this->handleMessage($message);
    }

    /**
     * Resuelve Callback Query
     */
    private function resolveCallback(CallbackQuery $callback): void
    {
        $this->handleCallback($callback);
    }
}
