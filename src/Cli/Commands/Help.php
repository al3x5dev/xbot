<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Style;

/**
 * Help Command class
 */
final class Help extends Cmd
{
    private static array $commands = [
        'help    ' => "Show this screen.\n",
        'install ' => "Create bot configuration files\n",
        'hook    ' => "Manages the webhook settings of your Telegram bot (see options)",
    ];

    private static array $options = [
        'set     ' => "Set the webhook\n",
        'get     ' => "Get the webhook information\n",
        'delete  ' => "Delete the webhook\n",
        'about   ' => "Get the bot's information\n",
    ];

    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv);
        if (!is_null($ck)) return $ck;

        $app = self::NAME;
        $version = self::VERSION;

        $color = function ($value, $colors): string {
            return Style::color($value, $colors);
        };

        $banner = <<<CMD
        $app {$color('v'.$version,'green')}
        
        {$color('Usage:', 'yellow')}
           php xbot [commands] [options]
        
        {$color('Commands:', 'yellow')}
        CMD;
        self::println($banner);

        //Comandos
        foreach (static::$commands as $key => $value) {
            if (is_string($value)) {
                print($color("   $key      ", 'green') . $value);
            }
        }

        // Opciones
        self::println(PHP_EOL.PHP_EOL.$color('Options:', 'yellow'));
        //self::println($color('   hook', 'green'));

        foreach (static::$options as $k => $v) {
            print($color("     $k    ", 'green') . $v);
        }
        return '';
    }
}
