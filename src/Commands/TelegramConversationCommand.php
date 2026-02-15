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
 * TelegramConversation command class
 */
final class TelegramConversationCommand extends Command
{
    use Io, AskForClass, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('telegram:conversation')
            ->setDescription('Create a new conversational flow in your bot')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the conversation class');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        /*$name =  $this->style->ask(
            'What will you call the new conversation? [Eg. Chat]',
            null,
            function ($name): ?string {
                if (empty($name)) {
                    throw new \InvalidArgumentException('You must specify a name for the conversation');
                }
                return $name;
            }
        );*/

        $name = $this->askForClassName(
            $input->getArgument('name'),
            'What will you call the new conversation? [Eg. Chat] (supports subdirs: Admin/User/Delete)'
        );

        $data = $this->makeDir(trim($name), 'bot/Conversations', $output);

        if (empty($data)) {
            $this->style->error('Conversation creation failed.');
            return Command::FAILURE;
        }

        $this->makeConversation($data);
        $output->writeln("<info>The new conversational flow has been created successfully.</info>");
        return Command::SUCCESS;
    }
}
