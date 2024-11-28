<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;
use Al3x5\xBot\xBot;

/**
 * Set Bot class
 */
final class HookSet extends Cmd
{
    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv, 3);
        if (!is_null($ck)) return $ck;

        $config = getcwd() . static::DS . 'config.php';


        if (!file_exists($config)) {
            return self::println(Style::bgColor("Run the 'install' command first.", 'red', false));
        }
        self::println("Use an empty string to remove the webhook integration\n");

        $xbot = new xBot(require $config);

        $arg='';
        if (empty($argv[2])) {
            $arg=self::input('HTTPS URL to send updates:');
        } else {
            $arg= $argv[2];
        }



        $data = $xbot->setWebhook([
            'url' => $arg,
        ]);
        return self::println(Style::bgColor($data,'green'));
    }
}
