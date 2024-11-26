<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\App;
use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Render;
use Al3x5\xBot\Cli\Style;

/**
 * Help Command class
 */
final class Help extends Cmd
{
    public static function execute(array $argv = []): string
    {
        $app = self::NAME;
        $version = self::VERSION;


        $banner = <<<CMD
        Welcome to $app v$version
        
        Usage:
        php xbot [options] [arguments]
        
        Options:
        CMD;
        self::println($banner);

        $commands = [
            'help   ' => "sd\n",
            'install' => "dfff\n",
            'hook   ' => "sdff\n",
        ];

        foreach ($commands as $key => $value) {
            self::printl("$key    ".Style::color($value,'green'));
        }



        return '';
    }
}
