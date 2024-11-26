<?php

namespace Al3x5\xBot\Cli;

/**
 * Cli App
 */
class App
{
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
    public function run() //: Returntype
    {
        # code...
    }
}
