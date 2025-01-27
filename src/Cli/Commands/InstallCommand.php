<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Exceptions\xBotException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Install cli command
 */
final class InstallCommand extends Command
{
    protected const CFG = 'config.php';

    protected SymfonyStyle $style;

    public function configure(): void
    {
        $this
            ->setName('install')
            ->setDescription('Create bot configuration files.')
            ->setHelp('This command will help you create the necessary configuration files for your bot.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->style = new SymfonyStyle($input, $output);

        if (file_exists(self::CFG)) {
            $this->style->success('The bot is already configured.');
        } else {
            $this->style->title('Bot configuration process starting...');

            // Solicitar el token del bot
            $token = $this->style->ask(
                'What is your bot token?',
                null,
                function (string $token): string {
                    if (!preg_match('/(\d+):[\w\-]+/', $token)) {
                        $this->style->error('Invalid token. Please verify that the token is correct and try again.');
                        exit;
                    }
                    return $token;
                }
            );
            $output->write("\033[2J\033[;H");


            // Solicitar el nombre del bot
            $name = $this->style->ask('What is your bot name?');
            $output->write("\033[2J\033[;H");


            // Solicitar los IDs de los administradores
            $admins = $this->style->ask(
                'Enter the IDs of the administrators (separated by commas)',
                null,
                function (string $ids): string {
                    $adm = [];
                    foreach (explode(',', $ids) as $value) {
                        if (!is_numeric($value) || strlen((string)$value) < 6) {
                            $this->style->error("'$value' is not a valid id");
                            exit;
                        }
                        $adm[] = $value;
                    }
                    return implode(',', $adm);
                }
            );
            $output->write("\033[2J\033[;H");


            // Solicitar si es un entorno de desarrollo
            $debug = $this->style->confirm('Is it development environment?', false);
            $output->write("\033[2J\033[;H");



            // Generar el contenido del archivo de configuración
            $data = <<<PHP
            <?php

            return [
                'token' => '$token',
                'name' => '$name',
                'admins' => [$admins],
                'dev' => $debug,
                'logs' => 'storage/logs',
                'parse_mode'=>'MarkdownV2',
                'handler' => [
                    //'/start' => \App\Commands\Start::class,
                ]
            ];

            PHP;

            // Guardar el contenido en un archivo
            if (file_put_contents('config.php', $data) != false) {
                $this->style->success('Bot configuration has been saved successfully."');
            } else {
                $this->style->success('Bot configuration has been saved successfully."');
                return Command::FAILURE;
            }
        }

        return Command::SUCCESS;
    }
}
