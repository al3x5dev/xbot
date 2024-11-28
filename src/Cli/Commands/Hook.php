<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;
use Al3x5\xBot\xBot;

/**
 * Hook Command class
 */
final class Hook extends Cmd
{
    private static array $options = [
        'set    ' => "Set the webhook\n",                 // setWebhook
        'get    ' => "Get the webhook information\n",     // getWebhookInfo
        'delete ' => "Delete the webhook\n",           // deleteWebhook
        'about  ' => "Get the bot's information\n",     // getMe
    ];

    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv, 3);
        if (!is_null($ck)) return $ck;

        if (count($argv) === 3) {
            if (file_exists('config.php')) {
                $cfg = require 'config.php';

                $xbot = new xBot($cfg);

                $output= match ($argv[2]) {
                    'set' => $xbot->setWebhook(['url' => $argv[2]]),
                    'get' => $xbot->getWebhookInfo(),
                    'delete' => $xbot->deleteWebhook(),
                    'about' => $xbot->getMe(),
                    default => self::help()
                };

                return self::format($output);
            }
        }

        return self::help();
    }

    public static function help(): string
    {
        self::println(
            self::NAME . Style::color(' v' . self::VERSION, 'green') . PHP_EOL . PHP_EOL .
                Style::color('Usage:', 'yellow') . PHP_EOL .
                "php xbot hook [options]"
        );

        print(PHP_EOL . Style::color('Options:', 'yellow') . "\n");

        foreach (static::$options as $key => $value) {
            if (is_string($value)) {
                print(Style::color("   $key    ", 'green') . $value);
            }
        }
        return '';
    }

    public static function format($string) : string
    {
        if (strpos($string, ':') !== false) {
            echo "La cadena contiene ':'\n";
        } else {
            return Style::bgColor($string, 'green');
        }
    }
}
