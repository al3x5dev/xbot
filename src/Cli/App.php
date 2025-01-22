<?php

namespace Al3x5\xBot\Cli;

/**
 * Cli App
 */
class App
{
    /** @param array commands Comandos CLI*/


    /**
     * Punto de entrada
     */
    public function __construct(private int $argc, private array $argv)
    {
        $this->argc = $argc;
        $this->argv = $argv;
    }

    /**
     * Inicializa la aplicacion CLI
     */
    public function run(): string
    {
        if ($this->argc > 1) {
            $command = $this->argv[1];
            //busca el comando en el enum Commands
            if (Commands::tryFrom($command) != null) {
                return Commands::from($command)->execute($this->argv);
            }
            return Cmd::noFound($command);
        }
        return Commands::Help->execute($this->argv);
    }
}
