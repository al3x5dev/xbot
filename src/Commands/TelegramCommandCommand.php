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
            $output->writeln("<error>Error: The name cannot be empty.</error>");
            return Command::FAILURE;
        }

        // Normalizar el nombre (ej: "Start" → "/start")
        //$command = '/' . trim(strtolower($name), '/');


        $filename = $this->makeDir(trim($name), 'bot/Commands', $output);

        // Generar el archivo (implementa esto en tu trait MakeClass)
        $this->makeTelegramCommand($filename);

        $output->writeln("<info>Telegram command created successfully.</info>");
        return Command::SUCCESS;
    }
}
