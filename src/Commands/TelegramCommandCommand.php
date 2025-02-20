<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TelegramCommand command class
 */
final class TelegramCommandCommand extends Command
{
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:command')
            ->setDescription('Create a new Telegram command')
            ->setHelp('This command allows you to create a new Telegram command for your bot')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the command');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name =  !is_null($input->getArgument('name'))
            ? $input->getArgument('name')
            : $this->style->ask(
                'What should the Telegram command be named? [Eg. Start]',
                null,
                function ($name): ?string {
                    return (empty($name)) ? '' : $name;
                }
            );

        if ($name == '') {
            $this->style->error("The name cannot be empty");
            return Command::FAILURE;
        }

        // Verificar si el archivo ya existe
        if (file_exists(__DIR__ . "/bot/Commands/$name")) {
            $this->style->error("The command file already exists at {$name}.php");
            return Command::FAILURE;
        }

        $this->makeTelegramCommand($name, '/'.strtolower($name));
        $output->writeln("<info>Telegram command created successfully</info>");
        return Command::SUCCESS;
    }
}
