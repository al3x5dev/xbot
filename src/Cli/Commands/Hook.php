<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;

/**
 * Hook Command class
 */
final class Hook extends Cmd
{
    private static array $options = [
        'set    ' => "Set the webhook\n",                 // setWebhook
        'info   ' => "Get the webhook information\n",     // getWebhookInfo
        'delete ' => "Delete the webhook\n",           // deleteWebhook
        'about  ' => "Get the bot's information\n",     // getMe
    ];

    public static function execute(array $argv = []): string
    {
        if (count($argv)>2) {
            $keys = array_map('rtrim', array_keys(self::$options));
            // Crear un nuevo array con las claves recortadas
            $clearOpt = array_combine($keys, self::$options);
            if (isset($clearOpt[$argv[2]])) {
                return print(Style::bgColor("$argv[2]", 'green') . " {$clearOpt[$argv[2]]}\n");
            } else {
                return self::println("eror");
            }
        }

        self::println(
            self::NAME . Style::color(' v' . self::VERSION, 'green') . PHP_EOL . PHP_EOL .
                Style::color('Usage:', 'yellow') . PHP_EOL .
                "php vendor/bin/xbot hook:[options]"
        );

        print(PHP_EOL . Style::color(
            'Available commands for the "hook" namespace:',
            'yellow'
        ) . "\n");

        foreach (static::$options as $key => $value) {
            if (is_string($value)) {
                print(Style::color("   $key    ", 'green') . $value);
            }
        }
        return '';
    }
}
