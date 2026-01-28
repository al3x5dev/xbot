<?php

namespace Al3x5\xBot\Exceptions;

use Al3x5\xBot\Events;

/**
 * Exception Handler Class
 */
class ExceptionHandler
{
    private static ?ExceptionHandler $me = null;

    private const ERROR_TYPE = [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE];

    private function __construct()
    {
        $this->handlers();
    }

    /**
     * Singleton
     */
    public static function start(): self
    {
        if (is_null(self::$me)) {
            self::$me = new self;
        }
        return self::$me;
    }

    /**
     * Manejador principal de errores y excepciones
     */
    public function handlers(): void
    {
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        register_shutdown_function([$this, 'shutdownHandler']);
    }

    /**
     * Manejador de excepciones
     */
    public function exceptionHandler(\Throwable $e): void
    {
        Events::logger(
            get_class($e),
            date('Ymd') . '.log',
            $e->getMessage() . ' | ' . $e->getTraceAsString(),
            [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ],
            'error',
        );
        //detiene todo
        exit(1);
    }

    /**
     * Manejador de errores
     */
    public function errorHandler(
        int $severity,
        string $message,
        ?string $file = null,
        ?int $line = null
    ): void {
        if (!(error_reporting() & $severity)) {
            return;
        }

        throw new \ErrorException($message, 0, $severity, $file, $line);
    }

    private function shutdownHandler(): void
    {
        $error = error_get_last();

        if (!is_null($error)) {
            // Fatal Error?
            if (in_array($error['type'], self::ERROR_TYPE, true)) {
                $this->exceptionHandler(
                    new \ErrorException(
                        $error['message'],
                        0,
                        $error['type'],
                        $error['file'],
                        $error['line']
                    )
                );
            }
        }
    }
}
