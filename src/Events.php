<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Exceptions\xBotException;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Events class
 */
class Events
{
    private static array $loggers = [];
    /**
     * Crea un archivo de registro
     * 
     * @param string $name Canal de registro
     * @param string $file Fichero donde se guardara el registro
     * @param string $message Mensaje de registro
     * @param array $context 
     */
    public static function logger(
        string $name,
        string $file,
        string $message,
        array $context = [],
        string $level = 'debug'
    ): void {
        $key = "$name:$file";

        if (!isset(self::$loggers[$key])) {

            $log = new Logger($name);
            $stream_handler = new StreamHandler(base("storage/logs/$file"));

            if (Config::get('debug') && preg_match('/^dev/', $name)) {
                $stream_handler->setFormatter(new JsonFormatter());
            }

            //Establece el Nivel de Prioridad
            $level = self::level($level);

            $log->pushHandler($stream_handler);

            //Almacenar en logger proiedad
            self::$loggers[$key] = $log;
        }
        self::$loggers[$key]->$level($message, $context);
    }

    /**
     * Establece los niveles de prioridad
     */
    private static function level(string $lv): string
    {
        $levels = [
            'emergency',
            'critical',
            'error',
            'warning',
            'info',
            'debug'
        ];

        foreach ($levels as $level) {
            if ($lv === $level) {
                return $lv;
            }
        }

        throw new xBotException("Incorrect Log level: '$lv'");
    }
}
