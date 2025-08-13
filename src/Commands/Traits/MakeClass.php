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

        writeContentToFile(base("src/Commands/{$name}Command.php"), $content);
    }

    /**
     * Crear comandos de telegram
     */
    protected function makeTelegramCommand(string $file): void
    {
        list($namespace, $class) = self::getClassName($file);
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
                \$this->reply('$command command executed');
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
    protected function makeCallback(string $file, string $action): void
    {
        list($namespace, $class) = self::getClassName($file);

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
                \$this->reply('Callback executed');
            }
        }
        PHP;

        writeContentToFile($file, $content);
    }

    /**
     * Crear conversaciones de telegram
     */
    protected function makeConversation(string $file): void
    {
        list($namespace, $class) = self::getClassName($file);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace $namespace;
        
        use Al3x5\\xBot\Conversations;

        class $class extends Conversations
        {
            public function execute(array \$params=[]): void
            {
                \$this->reply('Conversation executed');
            }
        }
        PHP;

        writeContentToFile($file, $content);
    }

    /**
     * Crear handlers de telegram
     */
    protected function makeTelegramHandler(string $file): void
    {
        list($namespace, $class) = self::getClassName($file);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace $namespace;
        
        use Al3x5\\xBot\Handlers;

        class $class extends Handlers
        {
            public function execute(): void
            {
                \$this->reply('handler executed');
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
    public function makeDir(string $name, string $path, OutputInterface $output): string|int
    {

        // Subdirectorios
        $subDirs = explode('/', trim($name, '/'));

        // Fichero
        $file = ucfirst(strtolower(array_pop($subDirs) . '.php'));

        // Directorio
        $directory = trim(
            $path . '/' . implode(
                '/',
                array_map(
                    fn($n) => ucfirst($n),
                    $subDirs
                )
            ),
            '/'
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

        return $filename;
    }

    /**
     * Obtener nombre de la clase
     */
    public static function getClassName(string $file): array
    {
        return [
            trim(
                str_replace(
                    ['bot', '/', pathinfo($file)['basename']],
                    [botNamespace(), "\\", ''],
                    $file
                ),
                "\\"
            ),
            pathinfo($file)['filename']
        ];
    }
}
