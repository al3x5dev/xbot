<?php

use Al3x5\xBot\Attributes\Callback;
use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Callbacks;
use Al3x5\xBot\Commands;
use Al3x5\xBot\Config;

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
        $data = [];

        $files = scandir($path);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $className = pathinfo($file, PATHINFO_FILENAME);
                $fullClassName = botNamespace() . "\\" . basename($path) . "\\$className";

                // Verifica si la clase existe
                if (class_exists($fullClassName)) {
                    $reflection = new ReflectionClass($fullClassName);

                    //Instancia de Commands
                    if (is_subclass_of($fullClassName, Commands::class)) {
                        $attributes = $reflection->getAttributes(Command::class);
                    }

                    //Instancia de Callbacks
                    if (is_subclass_of($fullClassName, Callbacks::class)) {
                        $attributes = $reflection->getAttributes(Callback::class);
                    }

                    if (!empty($attributes)) {
                        $c_Attribute = $attributes[0]->newInstance();
                        $c_Name = $c_Attribute->getName();
                        $data[$c_Name] = $fullClassName;
                    }
                }
            }
        }

        // Guarda los comandos en un archivo JSON
        writeContentToFile("storage/$name.json", json_encode($data, JSON_PRETTY_PRINT));
    }
}

if (!function_exists('botNamespace')) {
    /**
     * Establece y devuelve el namespace para los archivos dentro de el directorio /bot
     */
    function botNamespace(): string
    {
        $name = Config::get('name');

        if (empty($name)) {
            throw new \RuntimeException('Bot name is not set in configuration.');
        }

        // Sanitizar el nombre del bot
        $sanitizedName = preg_replace('/[^a-zA-Z0-9_]/', ' ', $name);
        $sanitizedName = ucwords(strtolower($sanitizedName));
        $sanitizedName = str_replace(' ', '', $sanitizedName);

        // Validar que el nombre sea válido para un namespace
        if (!preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $sanitizedName)) {
            throw new \InvalidArgumentException('Invalid bot name for namespace generation.');
        }

        return $sanitizedName;
    }
}

if (!function_exists('base')) {
    /**
     * Establece directorio base del proyecto
     */
    function base(string $path = null): string
    {
        return empty($path) ? Config::get('abs_path') : Config::get('abs_path') . DIRECTORY_SEPARATOR . $path;
    }
}
