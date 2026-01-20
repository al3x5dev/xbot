<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Al3x5\xBot\Events;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Install cli command
 */
final class InstallCommand extends Command
{
    use Io, ConfigHandler, MakeClass;

    public function configure(): void
    {
        $this
            ->setName('install')
            ->setDescription('Create bot configuration files.')
            ->setHelp('This command will help you create the necessary configuration files for your bot.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);
        $this->clear();

        $output->writeln(sprintf('%s <info>%s</info>', Bot::NAME, Bot::VERSION));
        $this->style->title('Bot configuration process starting...');

        // Solicitar el token del bot
        $token = $this->askForToken();
        $this->clear();

        // Solicitar los IDs de los administradores
        $admins = $this->askForAdmins();
        $this->clear();

        // Solicitar si es un entorno de desarrollo
        $debug = $this->style->confirm('Is it development environment?', false) ? 'true' : 'false';
        $this->clear();

        // Crear archivos de configuración
        try {
            // Generar el contenido del archivo de configuración
            $output->writeln('<info>Creating config file...</info>');
            $this->generateConfigData($token, $admins, $debug);

            $output->writeln('<info>Creating directories...</info>');
            $this->createDirectories();

            $output->writeln('<info>Loading bot configuration...</info>');
            self::load(self::configFile());

             // Crear los middleware 
            $output->writeln('<info>Creating middlewares...</info>');
            $this->mwConfig();
            $this->loggerMiddleware();

            $output->writeln('<info>Creating command classes...</info>');
            $this->makeCommandClasses(); // Crear las clases Start y Help

            $output->writeln('<info>Updating composer.json...</info>');
            $this->updateComposerAutoload(); // Actualizar composer.json y autoload

            $output->writeln('<info>Registering commands...</info>');
            // Ejecutar el comando RegisterCommand
            $this->getApplication()->find('register')->run($input, new NullOutput);

            sleep(3);
            $this->clear();
            $this->style->success('Bot configuration has been saved successfully.');
        } catch (\Throwable $th) {
            Events::logger(
                'cli',
                'cli.log',
                'Failed to save bot configuration: ' . $th->getMessage(),
                $th->getTrace()
            );
            $this->style->error('Failed to save bot configuration: ' . $th->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    /**
     * Obtener token
     */
    private function askForToken(): string
    {
        return $this->style->ask(
            'What is your bot token?',
            null,
            function (?string $token): string {
                if (!preg_match('/(\d+):[\w\-]+/', $token)) {
                    throw new \InvalidArgumentException('Invalid token. Please verify that the token is correct and try again.');
                }
                return $token;
            }
        );
    }

    /**
     * Obtiene el id de telegram de los admins
     */
    private function askForAdmins(): string
    {
        return $this->style->ask(
            'Enter the IDs of the administrators (separated by commas)',
            null,
            function (?string $ids): string {
                $adm = [];
                if (empty($ids)) {
                    return '';
                }
                foreach (explode(',', $ids) as $value) {
                    if (!is_numeric($value) || strlen((string)$value) < 6) {
                        throw new \InvalidArgumentException("'$value' is not a valid id");
                    }
                    $adm[] = $value;
                }
                return implode(',', $adm);
            }
        );
    }

    /**
     * Archivo de configuracion a generar
     */
    private function generateConfigData(?string $token, /*?string $name,*/ ?string $admins, string $debug): void
    {
        //'name' => '$name',
        $file = <<<PHP
            <?php

            return [
                'token' => '$token',
                'admins' => [$admins],
                'debug' => $debug,
                'abs_path' => __DIR__,
            ];
            PHP;

        writeContentToFile(self::configFile(), $file);
    }

    /**
     * Crea directorios
     */
    public function createDirectories(): void
    {
        foreach (self::directories as $directory) {
            if (!is_dir($directory)) {
                if (!mkdir($directory, 0775, true) && !is_dir($directory)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $directory));
                }
            }
        }
    }

    /**
     * Crea comandos del bot
     */
    public function makeCommandClasses(): void
    {
        $this->makeTelegramCommand('bot/Commands/Start.php', __DIR__);
        $this->makeTelegramCommand('bot/Commands/Help.php', __DIR__);
        $this->makeTelegramCommand('bot/Commands/Generic.php', __DIR__);
    }

    /**
     * Actualizar composer
     */
    public function updateComposerAutoload(): void
    {
        $composerJsonPath = 'composer.json';

        if (!file_exists($composerJsonPath)) {
            throw new \RuntimeException('composer.json file does not exist.');
        }

        $composerJson = json_decode(file_get_contents($composerJsonPath), true);
        // Asegurarse de que la sección de autoload existe
        if (!isset($composerJson['autoload'])) {
            $composerJson['autoload'] = [];
        }

        // Agregar o actualizar la sección de psr-4
        $composerJson['autoload']['psr-4']['Bot\\'] = 'bot/';

        // Guardar los cambios en composer.json
        writeContentToFile($composerJsonPath, json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        // Ejecutar el comando para actualizar el autoload
        shell_exec('composer dump-autoload');
    }

    /**
     * Crea archivos de configuracion para middleware
     */
    private function mwConfig()
    {
        $content = <<<PHP
        <?php

        use Bot\Middlewares\UpdateLoggerMiddleware;

        return [
            // Middleware global (se aplica a TODOS los tipos de updates)
            'global' => [
                UpdateLoggerMiddleware::class
            ],

            // Middleware por TIPO de update
            'types' => [
                'message' => [

                ],
                'command' => [

                ],
                'callback_query' => [

                ],
                'inline_query' => [

                ],
            ],

            // Middleware por COMANDO específico (sin /)
            'commands' => [

            ],
        ];
        PHP;

        writeContentToFile(self::mwFile(), $content);
    }

        /**
     * Crea archivos de configuracion para middleware
     */
    private function loggerMiddleware()
    {
        $content = <<<PHP
        <?php
        
        namespace Bot\Middlewares;

        use Al3x5\\xBot\Config;
        use Al3x5\\xBot\Events;
        use Al3x5\\xBot\Middlewares;

        class UpdateLoggerMiddleware extends Middlewares
        {
            public function handle(\Closure \$next)
            {
                if (Config::get('debug')) {
                    Events::logger('development', 'update.log', json_encode(\$this->update));
                }

                return \$next();
            }
        }
        PHP;

        writeContentToFile(self::mwFile('Middlewares/UpdateLoggerMiddleware.php'), $content);
    }
}
