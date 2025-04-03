<?php

namespace Al3x5\xBot\Commands\Traits;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

trait MakeClass
{
    /**
     * Crear comandos de consola
     */
    protected function makeCliCommand(string $name, string $command): void
    {
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php

        namespace Al3x5\\xBot\Commands;

        use Symfony\Component\Console\Command\Command;
        use Symfony\Component\Console\Input\InputInterface;
        use Symfony\Component\Console\Output\OutputInterface;

        /**
        * $name command class
        */
        final class {$name}Command extends Command
        {
            public function configure(): void
            {
                \$this
                    ->setName('$command')
                    ->setDescription('')
                    ->setHelp('');
            }
        
            public function execute(InputInterface \$input, OutputInterface \$output): int
            {
                return Command::SUCCESS;
            }
        }
        PHP;

        writeContentToFile("src/Commands/{$name}Command.php", $content);
    }

    /**
     * Crear comandos de telegram
     */
    protected function makeTelegramCommand(
        string $file,
        string $namespath
    ): void {
        $namespace = self::geNamespace($namespath, 'Commands');
        $class = self::getClassName($file);
        $command = '/' . strtolower($class);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace $namespace;
        
        use Al3x5\\xBot\Commands;

        use Al3x5\\xBot\Attributes\Command;

        #[Command('$command')]
        class $class extends Commands
        {
            public function execute(...\$params): void
            {
                \$this->bot->reply('$command command executed');
            }
            
            public function getDescription(): string
            {
                return 'Command description';
            }
        }
        PHP;

        writeContentToFile($file, $content);
    }

    /**
     * Crear callback de telegram
     */
    protected function makeCallback(
        string $file,
        string $action,
        string $namespath
    ): void {
        $namespace = self::geNamespace($namespath, 'Callbacks');
        $class = self::getClassName($file);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace $namespace;
        
        use Al3x5\\xBot\Callbacks;

        use Al3x5\\xBot\Attributes\Callback;

        #[Callback('$action')]
        class $class extends Callbacks
        {
            public function execute(): void
            {
                \$this->bot->reply('Callback executed');
            }
        }
        PHP;

        writeContentToFile($file, $content);
    }

    /**
     * Crear conversaciones de telegram
     */
    protected function makeConversation(string $file, string $namespath): void
    {
        $namespace = self::geNamespace($namespath, 'Conversations');
        $class = self::getClassName($file);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace $namespace;
        
        use Al3x5\\xBot\Conversation;

        class $class extends Conversation
        {
            public function execute(array \$params=[]): void
            {
                \$this->bot->reply('Conversation executed');
            }
        }
        PHP;

        writeContentToFile($file, $content);
    }

    /**
     * Obtener directorio
     * 
     * Obtiene y crea los subdirectorios para las clases dentro de: 
     *  - bot/Callbacks,
     *  - bot/Commands,
     *  - bot/Conversations
     */
    public function makeDir(string $name, string $path, OutputInterface $output): array|int
    {
        // Definir rutas base
        $basePath = dirname(__DIR__, 3) . $path;

        // Subdirectorios
        $subDirs = explode('/', trim($name, '/'));

        // Fichero
        $file = ucfirst(strtolower(array_pop($subDirs) . '.php'));

        // Directorio
        $directory = $basePath . '/' . implode(
            '/',
            array_map(
                fn($n) => ucfirst($n),
                $subDirs
            )
        );

        // Crear directorios si no existen
        if (!file_exists($directory)) {
            mkdir($directory, 0775, true);
        }

        // Ruta completa del archivo
        $filename = $directory . '/' . $file;

        // Verificar si el archivo ya existe
        if (file_exists($filename)) {
            $output->writeln("<error>Error: The file already exists at $filename</error>");
            return Command::FAILURE;
        }

        return [$filename, $directory];
    }

    /**
     * Obtener namespaces
     */
    public static function geNamespace(string $folder, $path): string
    {
        return botNamespace() . '\\' . str_replace(
            '/',
            '\\',
            substr(
                $path,
                strpos($path, $folder)
            )
        );
    }

    /**
     * Obtener nombre de la clase
     */
    public static function getClassName(string $file): string
    {
        return substr(
            basename($file),
            0,
            strpos(
                basename($file),
                '.php'
            )
        );
    }
}
