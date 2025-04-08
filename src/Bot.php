<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\ExceptionHandler;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Traits\CallbackHandler;
use Al3x5\xBot\Traits\CommandHandler;
use Mk4U\Http\Request;

class Bot
{
    public const NAME = 'xBot';

    public const VERSION = '2.0.0-RC1';

    public ?Update $update = null;

    use CallbackHandler,
        CommandHandler;

    /**
     * Inicializa el bot
     */
    public function __construct(array $cfg)
    {
        ExceptionHandler::start();
        Config::init($cfg);
        //
        $this->setCommands(base('storage/commands.json'));
        $this->setCallbacks(base('storage/callbacks.json'));
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
            'message' => $this->resolveMessage(),
            'callback_query' => $this->resolveCallback(),
            default => throw new xBotException(
                sprintf('Unsupported update type: %s', $this->update->type())
            )
        };
    }

    /**
     * Resuelve mensaje
     */
    private function resolveMessage(): void
    {
        if ($this->update->getMessage()->isCommand()) {
            $this->handleCommand();
            return;
        }
        //mensage generico 
        $this->handleMessage();
    }

    /**
     * Resuelve Callback Query
     */
    private function resolveCallback(): void
    {
        $this->handleCallback();
    }
}
