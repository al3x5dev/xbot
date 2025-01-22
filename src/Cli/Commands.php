<?php

namespace Al3x5\xBot\Cli;

/**
 * Enum para registrar los comandos cli.
 * 
 * En este enum se relaciona el comando cli con su respectivo objeto Al3x5\xBot\Cli\Cmd
 */
enum Commands: string
{
    //General Commands
    case Help = 'help';
    case Install = 'install';
    //Hook Commands
    case Hook = 'hook';
    case HookSet = 'hook:set';
    case HookInfo = 'hook:info';
    case HookDelete = 'hook:delete';
    case HookAbout = 'hook:about';

    /**
     * Ejecuta el comando especificado
     */
    public function execute(array $argv): string
    {
        return match ($this) {
            self::Help => \Al3x5\xBot\Cli\Commands\Help::execute($argv),
            self::Install => \Al3x5\xBot\Cli\Commands\Install::execute($argv),
            self::Hook => \Al3x5\xBot\Cli\Commands\Hook::execute($argv),
            self::HookSet => \Al3x5\xBot\Cli\Commands\HookSet::execute($argv),
            self::HookInfo => \Al3x5\xBot\Cli\Commands\HookInfo::execute($argv),
            self::HookDelete => \Al3x5\xBot\Cli\Commands\HookDelete::execute($argv),
            self::HookAbout => \Al3x5\xBot\Cli\Commands\HookAbout::execute($argv),
        };
    }
}
