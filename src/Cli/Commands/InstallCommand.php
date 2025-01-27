<?php

namespace Al3x5\xBot\Cli\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * undocumented class
 */
final class InstallCommand extends Command
{
    protected const CFG = 'config.php';

    public function configure(): void
    {
        $this
            ->setName('install')
            ->setDescription('Create bot configuration files.')
            ->setHelp('This command will help you create the necessary configuration files for your bot.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $style= new SymfonyStyle($input,$output);

        if (file_exists(self::CFG)) {
            $style->success('The bot is already configured.');
        } else {
            $output->writeln('Installing bot configuration files...');

            $helper = $this->getHelper('question');

            // Solicitar el token del bot
            $tokenQuestion = new Question('Enter your bot token: ');
            $token = $helper->ask($input, $output, $tokenQuestion);


            // Solicitar el nombre del bot
            $nameQuestion = new Question('Enter your bot name [optional]: ');
            $name = $helper->ask($input, $output, $nameQuestion);


            // Solicitar los IDs de los administradores
            $adminsQuestion = new Question('Enter the IDs of the administrators (separated by commas) [optional]: ');
            $adminsInput = $helper->ask($input, $output, $adminsQuestion);
            $admins = $adminsInput;


            // Solicitar si es un entorno de desarrollo
            $devQuestion = new Question('Is it development environment [yes/no]?: ');
            $dev = $helper->ask($input, $output, $devQuestion);
            $dev = ($dev === 'yes') ? 'true' : 'false';


            // Generar el contenido del archivo de configuración
            $data = <<<PHP
        <?php
        return [
            'token' => '$token',
            'name' => '$name',
            'admins' => [$admins],
            'dev' => $dev,
            'logs' => 'storage/logs',
            'parse_mode' => 'MarkdownV2',
            'handler' => [
                //NAMESPACES COMMANDS
                //'/start' => \App\Commands\StartCommand::class,
            ]
        ];
        PHP;

            // Guardar el contenido en un archivo
            file_put_contents('config.php', $data);

            $style->success('Bot configuration has been saved successfully."');
        }

        return Command::SUCCESS;
    }
}
