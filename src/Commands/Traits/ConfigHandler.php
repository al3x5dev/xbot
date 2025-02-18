<?php

namespace Al3x5\xBot\Commands\Traits;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

trait ConfigHandler
{
    protected const directories = [
        'storage/logs',
        'storage/cache',
        'bot/Callbacks',
        'bot/Commands',
        'bot/Conversations',
    ];

    /**
     * Retorna ubicacion del archivo de configuracion
     */
    public static function configFile() : string
    {
        return getcwd() . DIRECTORY_SEPARATOR . 'config.php';
    }

    /**
     * Ejecuta comando install en caso de no encontrar el archivo config.php
     */
    protected function runInstall() : int
    {
        if (!file_exists(self::configFile())) {
            return $this
                ->getApplication()
                ->find('install')
                ->run(
                    new ArrayInput([]),
                    new ConsoleOutput()
                );
        }
        return 0;
    }
}
