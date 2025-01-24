<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Commands\Traits\HookTrait;
use Al3x5\xBot\Bot;

/**
 * Info Webhook Bot class
 */
final class HookInfo extends Cmd
{
    use HookTrait;

    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv);
        if (!is_null($ck)) return $ck;

        $config = getcwd() . DIRECTORY_SEPARATOR . 'config.php';
        
        self::isConfig($config);
        $data = (new Bot(require $config))->getWebhookInfo();
        return self::display($data);
    }
}
