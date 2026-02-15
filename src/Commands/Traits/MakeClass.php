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
    protected function makeTelegramCommand(array $data): void
    {
        $class = $data['class'];
        $command = '/' . strtolower($class);
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace {$data['namespace']};
        
        use Al3x5\\xBot\Commands;

        use Al3x5\\xBot\Attributes\Command;

        #[Command('$command')]
        class $class extends Commands
        {
            public function execute(): void
            {
                \$this->reply("Command $command executed.");
            }
            
            public static function description(): string
            {
                return 'Command description';
            }
        }
        PHP;

        writeContentToFile($data['filename'], $content);
    }

    /**
     * Crear callback de telegram
     */
    protected function makeCallback(array $data, string $action): void
    {
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace {$data['namespace']};
        
        use Al3x5\\xBot\Callbacks;

        use Al3x5\\xBot\Attributes\Callback;

        #[Callback('$action')]
        class {$data['class']} extends Callbacks
        {
            public function execute(): void
            {
                \$this->reply("Callback handled.");
            }
        }
        PHP;

        writeContentToFile($data['filename'], $content);
    }

    /**
     * Crear conversaciones de telegram
     */
    protected function makeConversation(array $data): void
    {
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace {$data['namespace']};
        
        use Al3x5\\xBot\Conversations;

        class {$data['class']} extends Conversations
        {
            public function start(): void
            {
                // \$this->reply('Ask the user something to begin the conversation.');
            }
        }
        PHP;

        writeContentToFile($data['filename'], $content);
    }

    /**
     * Crear handlers de telegram
     */
    protected function makeTelegramHandler(array $data): void
    {
        // Crear el contenido de la clase
       $content = <<<PHP
        <?php
        namespace {$data['namespace']};
        
        use Al3x5\\xBot\Handlers;

        class {$data['class']} extends Handlers
        {
            public function execute(): void
            {
                // Update handling logic
            }
        }
        PHP;

        writeContentToFile($data['filename'], $content);
    }

    /**
     * Crear middleware
     */
    protected function makeTelegramMiddleware(array $data): void
    {
        // Crear el contenido de la clase
        $content = <<<PHP
        <?php
        namespace {$data['namespace']};
        
        use Al3x5\\xBot\Middlewares;

        class {$data['class']} extends Middlewares
        {
            public function handle(\Closure \$next)
            {
                // Middleware logic goes here
                return \$next();
            }
        }
        PHP;

        writeContentToFile($data['filename'], $content);
    }

    /**
     * Obtener directorio
     * 
     * Obtiene y crea los subdirectorios para las clases dentro de: 
     *  - bot/Callbacks,
     *  - bot/Commands,
     *  - bot/Conversations
     */
    public function makeDir(
        string $name,
        string $path,
        OutputInterface $output
    ): array|int {

        // Sanitizar
        $name = preg_replace('/[^A-Za-z0-9\/_-]/', '', $name);

        $subDirs = explode('/', trim($name, '/'));

        $rawClass = array_pop($subDirs);
        $class = $this->studly($rawClass);
        $file = $class . '.php';

        // Crear directorio físico
        $directory = rtrim($path, '/');

        if (!empty($subDirs)) {
            $directory .= '/' . implode(
                '/',
                array_map(fn($n) => ucfirst($n), $subDirs)
            );
        }

        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $filename = $directory . '/' . $file;

        if (file_exists($filename)) {
            $output->writeln("<error>File already exists: $filename</error>");
            return Command::FAILURE;
        }

        // Construir namespace dinámico
        $baseNamespace = str_replace('/', '\\', ucfirst($path));

        if (!empty($subDirs)) {
            $baseNamespace .= '\\' . implode(
                '\\',
                array_map(fn($n) => ucfirst($n), $subDirs)
            );
        }

        return [
            'filename'  => $filename,
            'class'     => $class,
            'namespace' => $baseNamespace
        ];
    }

    /**
     * Normaliza
     */
    protected function studly(string $value): string
    {
        $value = str_replace(['-', '_'], ' ', $value);
        $value = ucwords($value);
        return str_replace(' ', '', $value);
    }
}
