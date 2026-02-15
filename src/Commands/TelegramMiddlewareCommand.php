<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\AskForClass;
use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TelegramMiddleware command class
 */
final class TelegramMiddlewareCommand extends Command
{
    use Io, AskForClass, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:middleware')
            ->setDescription('Create a middleware')
            ->setHelp('This command allows you to create a new middleware for your bot')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'The middleware class name'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name = $this->askForClassName(
            $input->getArgument('name'),
            'Middleware name (e.g. auth or auth/user)'
        );

        if (!str_ends_with($name, 'Middleware')) {
            $name .= '-middleware';
        }

        $output->writeln($name);

        // Crear directorio y archivo
        $data = $this->makeDir($name, 'bot/Middlewares', $output);

        if (empty($data)) {
            $this->style->error('Middleware creation failed.');
            return Command::FAILURE;
        }


        // Generar clase
        $this->makeTelegramMiddleware($data);

        $output->writeln("<info>Middleware [{$data['filename']}] created successfully.</info>");

        return Command::SUCCESS;
    }
}
