<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Traits\Responder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Hook info command class
 */
final class HookInfoCommand extends Command
{
    use Io, ConfigHandler;
    use Responder;

    public function configure(): void
    {
        $this
            ->setName('hook:info')
            ->setDescription("Gets information about the Telegram bot's webhook.")
            ->setHelp(
                "This command allows you to get information about the URL of your Telegram bot's webhook. "
                    . "Provides details about the status of the webhook, including whether it is configured, "
                    . "the current URL and any errors that may have occurred. "
                    . "Use this command to verify the configuration of your bot's webhook."
            );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        //Revisar si config.php existe
        $this->runInstall();

        try {
            $data = $this->getWebhookInfo();
            return $this->displayInfo($data->getPropertys());
        } catch (\Throwable $th) {
            //$this->style->note('Trace: ' . $th->getTraceAsString());
            throw new \ErrorException($th->getMessage());
        }
    }
}
