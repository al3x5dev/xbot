<?php

namespace Al3x5\xBot\Cli;

enum Commands: string
{
    //General Commands
    case Help = 'help';
    case Config = 'config';
    //Hook Commands
    case Hook = 'hook';
    case HookSet = 'hook:set';
    case HookInfo = 'hook:info';
    case HookDelete = 'hook:delete';
    case HookAbout = 'hook:about';

    /**
     * Ejecuta el comando especificado
     */
    public function execute(): string
    {
        return match ($this) {
            self::Help => \Al3x5\xBot\Cli\Commands\Help::execute(),
            self::Config => \Al3x5\xBot\Cli\Commands\Config::execute(),
            self::Hook => \Al3x5\xBot\Cli\Commands\Hook::execute(),
            self::HookSet => \Al3x5\xBot\Cli\Commands\HookSet::execute(),
            self::HookInfo => \Al3x5\xBot\Cli\Commands\HookInfo::execute(),
            self::HookDelete => \Al3x5\xBot\Cli\Commands\HookDelete::execute(),
            self::HookAbout => \Al3x5\xBot\Cli\Commands\HookAbout::execute(),
        };
    }
}
