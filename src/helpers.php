<?php

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Commands;

if (!function_exists('writeContentToFile')) {
    /**
     * Gestiona posibles errores de de file_put_contents
     */
    function writeContentToFile(string $filePath, mixed $content, int $flags = 0): void
    {
        $dir = dirname($filePath);
        if (!is_writable($dir)) {
            throw new \ErrorException("Error: You do not have write permissions in the directory '$dir'.");
        }

        if (file_put_contents($filePath, $content, $flags) === false) {
            throw new \ErrorException("Error: Could not write to the file '$filePath'.");
        }
    }
}

if (!function_exists('register')) {
    /**
     * Registra los comandos disponibles en un directorio y los guarda en un archivo JSON.
     */
    function register(string $path, string $name): void
    {
        $commands = [];

        $files = scandir($path);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $className = pathinfo($file, PATHINFO_FILENAME);
                $fullClassName = "MyBot\\".basename($path)."\\$className";

                // Verifica si la clase existe y es una instancia de Commands
                if (
                    class_exists($fullClassName)
                    &&
                    is_subclass_of($fullClassName, Commands::class)
                    ) {
                    $reflection = new ReflectionClass($fullClassName);
                    $attributes = $reflection->getAttributes(Command::class);

                    if (!empty($attributes)) {
                        $commandAttribute = $attributes[0]->newInstance();
                        $commandName = $commandAttribute->getName();
                        $commands[$commandName] = $fullClassName;
                    }
                }
            }
        }

        // Guarda los comandos en un archivo JSON
        writeContentToFile("storage/$name.json", json_encode($commands, JSON_PRETTY_PRINT));
    }
}
