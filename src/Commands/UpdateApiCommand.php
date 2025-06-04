<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Generator\Scrapper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
* UpdateApi command class
*/
final class UpdateApiCommand extends Command
{
    public function configure(): void
    {
        $this
            ->setName('update:api')
            ->setDescription('Update the Telegram Bot API to the latest available version')
            ->setHelp('This command allows you to update the API to the latest version');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("<info>Extracting documentation from Telegram Bot API...</info>");
        Scrapper::start();

        $output->writeln("<info>Creating Telegram Entities class...</info>");
        return Command::SUCCESS;
    }
}