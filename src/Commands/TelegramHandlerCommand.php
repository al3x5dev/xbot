<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TelegramHandler command class
 */
final class TelegramHandlerCommand extends Command
{
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:handler')

            ->setDescription('Create a new Telegram handler')
            ->setHelp('This command allows you to create a new Telegram update handler for your bot.')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the handler');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name =  !is_null($input->getArgument('name'))
            ? $input->getArgument('name')
            : $this->style->ask(
                "What should Telegram's update handler be called? [e.g., ChannelPost]",
                null,
                function ($name): ?string {
                    return (empty($name)) ? '' : $name;
                }
            );

        if ($name == '') {
            $output->writeln("<error>Error: The name cannot be empty.</error>");
            return Command::FAILURE;
        }

        $filename = $this->makeDir($name, 'bot/Handlers', $output);

        // Generar el archivo 
        $this->makeTelegramHandler($filename);

        $output->writeln("<info>Telegram handler created successfully.</info>");
        return Command::SUCCESS;
    }
}
