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
        return print($text . PHP_EOL);
    }

    /**
     * Recive parametros del usuario
     */
    public static function input(string $message): string
    {
        echo $message . PHP_EOL;
        // Lee la entrada del usuario
        // Elimina el salto de línea al final
        return trim(fgets(STDIN));
    }

    /**
     * Comando no encontrado
     */
    public static function noFound(string $command): string
    {
        return self::println(Style::bgColor('error', 'red') . " Command '$command' is not defined.");
    }

    /**
     * Argumento no esperado
     */
    public static function checkArguments(array $argv, int $arg = 2): ?string
    {
        if (count($argv) > $arg) {
            return self::println(Style::bgColor('error', 'red') . " No arguments expected for '$argv[1]' command, got '$argv[$arg]'");
        }
        return null;
    }
}
