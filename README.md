# xBot

**xBot** es una librería en PHP diseñada para facilitar la creación y gestión de bots de Telegram. Con un enfoque en la simplicidad y la eficiencia, **xBot** te permite centrarte en lo que realmente importa: desarrollar funcionalidades innovadoras para tus bots.

## Estado de Desarrollo

> [!CAUTION]
> Ten en cuenta que **xBot** se encuentra actualmente en una etapa de desarrollo. Esto significa que podrías encontrar algunos errores o comportamientos inesperados. Apreciamos tu comprensión y paciencia mientras trabajamos para mejorar la librería.
>
> Estamos comprometidos a lanzar una versión estable lo antes posible. Tu apoyo y *feedback* son esenciales en este proceso, y cada contribución ayuda a hacer de **xBot** una herramienta más robusta y confiable.

## Instalación

```bash
composer require al3x5/xbot:dev-main
```

## Uso

Antes de empezar a crear código, debes haber creado tu bot en Telegram. Puedes seguir las instrucciones en el siguiente enlace: [Instrucciones para crear y configurar un bot en BotFather](https://docs.radist.online/docs/espanol-1/productos-1/radist-web/conexiones/telegram-bot/instrucciones-para-crear-y-configurar-un-bot-en-botfather).


### Configurar

Para configurar **xBot** puede hacerlo de dos maneras:

1. Usando la  línea de comandos.
```bash
php vendor/bin/xbot install
```
2. Creando usted mismo el archivo de configuración.
```php
return [
    'token' => '1234567890:ABCDEFGHIJKLMNOQRSTZ', // YOUR BOT TOKEN
    'name' => 'MyBot', //BOT NAME
    'admins' => [123456789, 985632147], // ID's ADMINS
    'client' => new \Mk4U\Http\Client(), // HTTP CLIENT
    'storage' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage/cache', 'ttl' => 300]), // MANAGER CACHE
    'dev' => true, // ENVIRONMENT
    'logs' => 'storage/logs', // LOGS DIR
    'parse_mode'=>'MarkdownV2' // TELEGRAM PARSE MODE
    'handler' => [                       //NAMESPACES COMMANDS
        //'/start' => \App\Commands\Start::class,/
    ]
]
```

### Inicializar

Para inicializar su bot solo debe crear un archivo `.php`.
```php
require_once 'vendor/autoload.php';
$config = require_once 'config.php';

$xbot = new Al3x5\xBot\Bot();
$xbot->run();
```

### Enlazar mi bot con Telegram

Ya para este paso debe de tener su bot creado en Telegram mediante [@BotFather](https://t.me/BotFather).
Para enlazar tu bot con la API de Telegram solo tiene que correr un comando y proporcionar la url de tu bot:
```bash
php vendor/bin/xbot hook:set
```

### Crear comandos

Para crear comandos personalizados, puedes definirlos en el archivo de configuración en la sección `handler`. Aquí tienes un ejemplo básico:

```php
'handler' => [
    '/start' => \App\Commands\Start::class,
    '/help' => \App\Commands\Help::class,
],
```

Asegúrate de crear las clases correspondientes en el espacio de nombres `App\Commands`.
```php
namespace App\Commands;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Telegram;

final class Start extends Commands
{
    public function execute(array $params=[]): Telegram
    {
        return $this->bot->reply('Start command executed');
    }
}
```

## Contribuciones

Si deseas contribuir al desarrollo de xBot, aquí hay algunas formas en las que puedes hacerlo:

- Reporta errores o problemas que encuentres.
- Comparte tus ideas y sugerencias.
- Contribuye con código o documentación.


## Licencia
Este proyecto está licenciado bajo la [Licencia MIT](https://github.com/alexsandrov16/xbot/blob/main/LICENSE).

## Contacto
Si tienes alguna pregunta o comentario, no dudes en contactarme a través de [Telegram](http://t.me/alexsadrov16).

---

Gracias por considerar **xBot** para tus proyectos de bots de Telegram. Estamos emocionados de tenerte a bordo y esperamos que disfrutes trabajando con esta librería. ¡Juntos podemos construir algo grande!
