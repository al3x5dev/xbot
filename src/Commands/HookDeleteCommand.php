<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Commands\Traits\Io;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Hook delete command class
 */
final class HookDeleteCommand extends Command
{
    use Io, ConfigHandler;

    public function configure(): void
    {
        $this
            ->setName('hook:delete')
            ->setDescription('Delete the webhook for the Telegram bot.')
            ->setHelp(
                'This command allows you to delete the webhook URL for your Telegram bot. '
                    . 'Once the webhook is deleted, your bot will no longer receive updates from Telegram. '
                    . 'You can use this command when you want to stop receiving updates or when you want to set a new webhook.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        //Revisar si config.php existe
        $this->runInstall();

        try {
            $data = (new Bot(BOT_CFG))->deleteWebhook();
            $this->style->success($data);
            return Command::SUCCESS;
        } catch (\Throwable $th) {
            throw new \ErrorException($th->getMessage());
            
        }
    }
}
