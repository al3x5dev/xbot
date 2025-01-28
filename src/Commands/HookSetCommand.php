<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Commands\Traits\Io;
use Mk4U\Http\Uri;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * undocumented class
 */
final class HookSetCommand extends Command
{
    use Io, ConfigHandler;

    public function configure(): void
    {
        $this
            ->setName('hook:set')
            ->setDescription('Sets the webhook for the Telegram bot.')
            ->setHelp(
                'This command allows you to set the webhook URL for your Telegram bot. '
                    . 'Make sure that the URL is publicly accessible and configured to receive '
                    . 'HTTPS requests. You can use the --url option to specify the desired URL.'
            )
            ->addArgument('url', InputArgument::OPTIONAL, 'The URL to which Telegram will send updates.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        //Revisar si config.php existe
        $this->runInstall();

        $url =  !is_null($input->getArgument('url'))
            ? $input->getArgument('url')
            : $this->style->ask(
                'What is the URL for sending updates?',
                null,
                function ($url): string {
                    return (empty($url)) ? '' : $url;
                }
            );

        //Verificar si es una url valida
        if (
            (filter_var($url, FILTER_VALIDATE_URL)
                &&
                parse_url($url, PHP_URL_SCHEME) === 'https'
            ) === false
        ) {
            throw new \InvalidArgumentException("The URL you provided is not valid. Please check and try again.");
        }

        $data = (new Bot(require_once self::configFile()))->setWebhook([
            'url' => $url,
        ]);

        $this->style->success($data);

        return Command::SUCCESS;
    }

    public static function isUrl(?string $url): bool
    {
        return 0;
    }
}
