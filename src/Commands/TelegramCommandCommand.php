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
 * TelegramCommand command class
 */
final class TelegramCommandCommand extends Command
{
    use Io, AskForClass, MakeClass;
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

        $name = $this->askForClassName(
            $input->getArgument('name'),
            'What should the Telegram command be named? [Eg. Start] (supports subdirs: Admin/User/Ban)'
        );

        $data = $this->makeDir($name, 'bot/Commands', $output);

        if (empty($data)) {
            $this->style->error('Command creation failed.');
            return Command::FAILURE;
        }

        $this->makeTelegramCommand($data);

        $output->writeln("<info>Telegram command [{$data['filename']}] created successfully.</info>");
        return Command::SUCCESS;
    }
}
