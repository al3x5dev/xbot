<?php

namespace Al3x5\xBot\Commands;

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
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:middleware')
            ->setDescription('Create a middleware')
            ->setHelp('This command allows you to create a new middleware for your bot')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'The middleware class name (e.g. AuthMiddleware)'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name = $input->getArgument('name')
            ?? $this->style->ask(
                'Middleware class name',
                null,
                fn($value) => trim((string) $value)
            );

        if (!$name) {
            $output->writeln('<error>Error: Middleware name cannot be empty.</error>');
            return Command::FAILURE;
        }

        if (!preg_match('/^[A-Z][A-Za-z0-9]+Middleware$/', $name)) {
            $name .= '-middleware';
        }

        // Crear directorio y archivo
        $filename = $this->makeDir($name, 'bot/Middlewares', $output);

        // Generar clase
        $this->makeTelegramMiddleware($filename, $name);

        $output->writeln("<info>Middleware [$name] created successfully.</info>");

        return Command::SUCCESS;
    }
}
