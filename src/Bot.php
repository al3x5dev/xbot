<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\ExceptionHandler;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Traits\CallbackHandler;
use Al3x5\xBot\Traits\MessageHandler;
use Al3x5\xBot\Traits\Responder;
use Mk4U\Http\Request;

class Bot
{
    public const NAME = 'xBot';

    public const VERSION = '2.4.0';

    public ?Update $update = null;

    use CallbackHandler,
        MessageHandler,
        Responder;

    /**
     * Inicializa el bot
     */
    public function __construct(array $config)
    {
        ExceptionHandler::start();
        Config::init($config ?? xConfig());
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
        $type = $this->update->type();

        if ($type === null) {
            throw new xBotException("Received update with unknown type: " . json_encode($this->update->getProperties()));
        }

        match ($type) {
            'message' => $this->resolveMessage(),
            'callback_query' => $this->resolveCallback(),
            default => $this->resolveHandler($type)
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

    /**
     * Resolver Handlers 
     */
    private function resolveHandler(string $type): void
    {
        $handler = preg_replace_callback('/_([a-z])/', function ($match) {
            return strtoupper($match[1]);
        }, $type);

        $class = botNamespace() . '\\Handlers\\' . ucfirst($handler);

        (new $class($this->update))->execute();
    }
}
