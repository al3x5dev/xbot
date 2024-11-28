<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;
use Al3x5\xBot\xBot;

/**
 * Info Webhook Bot class
 */
final class HookInfo extends Cmd
{
    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv);
        if (!is_null($ck)) return $ck;

        $config = getcwd() . static::DS . 'config.php';


        if (!file_exists($config)) {
            return self::println(Style::bgColor("Run the 'install' command first.", 'red', false));
        }
        $xbot = new xBot(require $config);
        $data = $xbot->getWebhookInfo();

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            // Dividimos la línea en la parte antes de los dos puntos y el resto
            list($key, $value) = explode(":", $line, 2);
            // Imprimimos la parte clave en verde y el valor en el color por defecto
            print(Style::color(trim($key),'green') . ": " . trim($value) . "\n");
        }

        return '';
    }
}
