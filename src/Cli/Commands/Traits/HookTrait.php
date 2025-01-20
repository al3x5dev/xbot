<?php

namespace Al3x5\xBot\Cli\Commands\Traits;

use Al3x5\xBot\Cli\Style;

/**
 * Hook Trait
 */
trait HookTrait
{
    private static function display(string $data): string
    {
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            // Omitir líneas vacías
        if (trim($line) === '') {
            continue;
        }
            // Dividir cada línea en clave y valor
            if (strpos($line, ':') !== false) {
                list($key, $value) = explode(': ', $line, 2);
                $array[trim($key)] = trim($value);
            }
            print(Style::color(trim($key), 'green') . ": " . trim($value) . "\n");
        }
        return '';
    }

    private static function isConfig(string $config): string
    {
        if (!file_exists($config)) {
            return self::println(Style::bgColor("Run the 'install' command first.", 'red', false));
        }
        return '';
    }
}
