<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TelegramCallback command class
 */
final class TelegramCallbackCommand extends Command
{
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:callback')
            ->setDescription('Create a new Telegram callback')
            ->setHelp('This command allows you to create a new Telegram callback for your bot');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name = $this->style->ask(
            'What should the Telegram callback be named? [Eg. Option]',
            null,
            function (?string $name): string {
                if (empty($name)) {
                    throw new \InvalidArgumentException('You must specify a name for the callback');
                }
                return $name;
            }
        );

        $action = $this->style->ask(
            'What name for the callback action? [Eg. option]',
            null,
            function (?string $action): string {
                if (empty($action)) {
                    throw new \InvalidArgumentException('You must specify a name for the action');
                }
                return $action;
            }
        );

        list(
            $filename,
            $namespath
        ) = $this->makeDir($name, '/bot/Callbacks', $output);

        $this->makeCallback($filename, $action, $namespath);
        $output->writeln("<info>Telegram callback created successfully.</info>");
        return Command::SUCCESS;
    }
}
