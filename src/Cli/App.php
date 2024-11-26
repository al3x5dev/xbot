<?php

namespace Al3x5\xBot\Cli;

/**
 * Cli App
 */
class App
{
    private array $commands = [];

    /**
     * Punto de entrada
     */
    public function __construct(private int $argc, private array $argv)
    {
        $this->argc = $argc;
        $this->argv = $argv;

        //Comandos
        $this->commands = [
            'help' => \Al3x5\xBot\Cli\Commands\Help::class,
            'install' => \Al3x5\xBot\Cli\Commands\Install::class,
            'hook' => \Al3x5\xBot\Cli\Commands\Hook::class,

        ];
    }

    /**
     * Inicializa la aplicacion CLI
     */
    public function run(): string
    {
        if ($this->argc > 1) {
            $command = $this->argv[1];
            if (key_exists($command, $this->commands)) {
                return $this->commands[$command]::execute($this->argv);
            }
            return Cmd::noFound($command);
        }
        return \Al3x5\xBot\Cli\Commands\Help::execute();
    }
}
