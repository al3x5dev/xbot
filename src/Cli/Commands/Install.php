<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;

/**
 * Install Command class
 */
final class Install extends Cmd
{
    public static function execute(array $argv = []): string
    {
        $ck = self::checkArguments($argv);
        if (!is_null($ck)) return $ck;


        self::println(
            'This command will help you create the necessary configuration files for your bot.' . PHP_EOL
        );

        $data = '';

        $token = self::input("Enter your bot token:");
        $name = self::input("Enter your bot name [optional]:");

        $admins = self::input("Enter the IDs of the administrators (separated by commas) [optional]:");
        /*$adminsInput = self::input("Enter the IDs of the administrators (separated by commas)");
        $admins = array_map('trim', explode(',', $adminsInput));*/

        $dev = self::input("Is it development environment [yes/no]?:");
        $dev = ($dev === 'yes') ? 'true' : 'false';
        //$parseMode = self::input("Enter the parsing mode [HTML, Markdown or MarkdownV2]");

        $data = <<<PHP
        <?php
        return [
            'token' => '$token',
            'name' => '$name',
            'admins' => [$admins],
            'storage' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage/cache', 'ttl' => 300]),
            //'webhook'=> 'https://YOUR_WEBHOOK_URL,
            //'webhook_secret' => 'YOUR_WEBHOOK_SECRET',
            //'db'=>'sqlite:xbot.db',
            'dev' => $dev,
            'logs' => 'storage/logs', //LOGS DIR
            'parse_mode'=>'MarkdownV2',
            'handler' => [
                //NAMESPACES COMMANDS
                //'/start' => \App\Commands\StartCommand::class,
            ]
        ];
        PHP;

        static::make($data);

        return self::println(Style::bgColor('SUCCESS','green')." Process successfully completed");
    }

    private static function make(string $content)
    {
        if (!file_exists('storage')) {
            mkdir('storage/logs',recursive:true);
            mkdir('storage/cache',recursive:true);
            mkdir('bot/Commands',recursive:true);
            mkdir('bot/Conversations',recursive:true);
        }

        file_put_contents('config.php', $content);
    }
}
