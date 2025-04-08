<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * TelegramConversation command class
 */
final class TelegramConversationCommand extends Command
{
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:conversation')
            ->setDescription('Create a new conversational flow in your bot');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name =  $this->style->ask(
            'What will you call the new conversation? [Eg. Chat]',
            null,
            function ($name): ?string {
                if (empty($name)) {
                    throw new \InvalidArgumentException('You must specify a name for the conversation');
                }
                return $name;
            }
        );

        list(
            $filename,
            $namespath
        ) = $this->makeDir(trim($name), 'bot/Conversations', $output);

        $this->makeConversation($filename, $namespath);
        $output->writeln("<info>The new conversational flow has been created successfully.</info>");
        return Command::SUCCESS;
    }
}
