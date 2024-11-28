<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;
use Al3x5\xBot\xBot;

/**
 * Delete Bot class
 */
final class HookDelete extends Cmd
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
        $data = $xbot->deleteWebhook();
        return self::println(Style::bgColor($data,'green'));
    }
}
