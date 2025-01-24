<?php

namespace Al3x5\xBot\Cli\Commands;

use Al3x5\xBot\Cli\Cmd;
use Al3x5\xBot\Cli\Commands\Traits\HookTrait;
use Al3x5\xBot\Cli\Style;
use Al3x5\xBot\Bot;
use Mk4U\Http\Uri;

/**
 * Set Bot class
 */
final class HookSet extends Cmd
{
    use HookTrait;

    public static function execute(array $argv = []): string
    {
        //chequea si el usuario ha proporcionado algún argumento
        $ck = self::checkArguments($argv, 3);
        if (!is_null($ck)) return $ck;

        $config = getcwd() . DIRECTORY_SEPARATOR . 'config.php';

        self::isConfig($config);

        //Mensaje a mostrar en caso de que no se pase url como argumento
        $arg = '';
        if (empty($argv[2])) {
            $arg = self::input('HTTPS URL to send updates:');
        } else {
            $arg = $argv[2];
        }
        
        //verifica la url pasada por el usuario
        if (!self::isURL($arg)) {
            return self::println(Style::bgColor('error','red').' invalid URL');
        }
        
        //Enviar peticion a telegram
        $data = (new Bot(require $config))->setWebhook([
            'url' => $arg,
        ]);
        return self::println(Style::bgColor($data, 'green'));
    }

    /**
     * Verifica si la url pasada es valida
     */
    protected static function isURL(string $url): bool
    {
        $uri = new Uri($url);
        return !($url === '' || $uri->getScheme() != 'https');
    }
}
