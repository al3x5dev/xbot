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
        return self::println(Style::bgColor('Install','blue'));
    }
}
