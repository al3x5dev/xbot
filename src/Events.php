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

        //$file = ($file==='Ymd') ? date($file).'log' : $file ;

        $filename = Config::get('logs') . $file;

        if (!is_dir(Config::get('logs'))) {
            mkdir(Config::get('logs'), 0775, true);
        }

        $logger = new Logger($name);
        $stream_handler = new StreamHandler($filename);

        if (Config::get('dev') && preg_match('/^dev/', $name)) {
            $stream_handler->setFormatter(new JsonFormatter());
        }

        //Establece el Nivel de Prioridad
        $level = self::level($level);

        $logger->pushHandler($stream_handler);
        $logger->$level($message, $context);
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
