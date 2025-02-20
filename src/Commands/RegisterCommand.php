<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
* Register command class
*/
final class RegisterCommand extends Command
{
    use Io;
    public function configure(): void
    {
        $this
            ->setName('register')
            ->setDescription('Register commands and callbacks for your bot');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input,$output);

        $command='bot/Commands';
        $callback='bot/Callbacks';

        if (!file_exists($command) or !file_exists($callback)) {
            $this->style->error("The commands could not be registered. Run the 'install command' to fix this error");
            return Command::FAILURE;
        }

        register($command,'commands.json');
        register($callback, 'callbacks.json');

        $output->writeln("<info>Telegram commands successfully registered</info>");

        return Command::SUCCESS;
    }
}