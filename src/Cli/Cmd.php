<?php

namespace Al3x5\xBot\Cli;

/**
 * undocumented class
 */
abstract class Cmd
{
    public const NAME = 'xBot CLI';
    public const VERSION = '0.0.1';

    abstract public static function execute(array $argv = []);

    /**
     * Imprime en consola salto de linea
     */
    public static function println(string $text): string
    {
        return self::printl(PHP_EOL . $text . PHP_EOL);
    }

    /**
     * Imprime en consola
     */
    public static function printl(string $text): string
    {
        return print($text);
    }

    /**
     * Recive parametros del usuario
     */
    public static function input(string $message): string
    {
        echo $message . PHP_EOL;
        // Lee la entrada del usuario
        $input = fgets(STDIN);
        // Elimina el salto de línea al final
        return trim($input);
    }

    /**
     * Comando no encontrado
     */
    public static function noFound(string $command): string
    {
        return self::println(Style::bgColor('error', 'red') . " Command '$command' is not defined.");
    }
}
