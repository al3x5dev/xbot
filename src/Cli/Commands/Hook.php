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
        'get    ' => "Get the webhook information\n",     // getWebhookInfo
        'delete ' => "Delete the webhook\n",           // deleteWebhook
        'about  ' => "Get the bot's information\n",     // getMe
    ];

    public static function execute(array $argv = []): string
    {
        self::println(
            Style::bgColor("Manages the webhook settings of your Telegram bot", "cyan",false) .PHP_EOL .PHP_EOL .
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
}
