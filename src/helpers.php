<?php

use Al3x5\xBot\Attributes\Command;
use Al3x5\xBot\Commands;

if (!function_exists('sanatizeMarkdown')) {
    /**
     * Tenga en cuenta:
     * 
     * Cualquier carácter con código entre 1 y 126 inclusive puede 
     * tener un carácter de escape en cualquier lugar con un carácter '\' 
     * precedente, en cuyo caso se trata como un carácter normal y no como 
     * parte del marcado. Esto implica que el carácter '\' normalmente 
     * debe ir precedido de un carácter '\'.
     * 
     * Adentro pre y code entidades, todos los caracteres '`' y '\' deben 
     * ir precedidos de un carácter '\'.
     * 
     * Dentro del (...) Como parte del enlace en línea y la definición 
     * de emoji personalizada, todos los ')' y '\' deben ir precedidos 
     * por un carácter '\'.
     * 
     * En todos los demás lugares, los caracteres '_', '*', '[', ']', '(', ')', 
     * '~', '`', '>', '#', '+', ' -', '=', '|', '{', '}', '.', '!' 
     * debe tener como escape el carácter anterior '\'.
     * 
     * En caso de ambigüedad entre italic y underline entidades __ siempre se 
     * trata con avidez de izquierda a derecha como el principio o el final 
     * de una underline entidad, por lo que en lugar de ___italic underline___ 
     * usar ___italic underline_**__, agregando una entidad vacía en negrita como 
     * separador.
     * 
     * Se debe proporcionar un emoji válido como valor alternativo para el emoji 
     * personalizado. El emoji se mostrará en lugar del emoji personalizado en 
     * lugares donde no se puede mostrar un emoji personalizado (por ejemplo, 
     * notificaciones del sistema) o si el mensaje lo reenvía un usuario no premium. 
     * Se recomienda utilizar el emoji del campo emoji emoji personalizada de la 
     * etiqueta .
     * 
     * Las entidades emoji personalizadas solo pueden ser utilizadas por bots que 
     * compraron nombres de usuario adicionales en Fragment .
     */
    function sanatizeMarkdown(string $text): string
    {
        // Lista de caracteres que deben ser escapados
        $specialChars = [/*'_', /*'*',*/ /*'[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', */'.', '!'];

        // Escapa cada carácter especial
        foreach ($specialChars as $char) {
            $text = preg_replace('/(' . preg_quote($char, '/') . ')/', '\\\\$1', $text);
        }

        return $text;
    }
}

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
    function register(string $path, string $filename): void
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
        writeContentToFile($filename, json_encode($commands, JSON_PRETTY_PRINT));
    }
}
