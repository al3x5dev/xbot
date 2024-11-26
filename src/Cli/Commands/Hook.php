<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;

/**
 * Hook Command class
 */
final class Hook extends Cmd
{
    private array $options=[
        'help',                        // help message
        'set',                         // setWebhook
        'get',                         // getWebhookInfo
        'delete',                      // deleteWebhook
        'about',                       // getMe



    ];

    public static function execute(array $argv = []): string
    {
        return self::println(Style::color('Hook Command','green'));
    }
}
