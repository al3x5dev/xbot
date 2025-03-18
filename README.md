# xBot

![GitHub Release](https://img.shields.io/github/v/release/alexsandrov16/xbot?include_prereleases&style=flat-square&color=blue)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/alexsandrov16/http?style=flat-square)
![GitHub License](https://img.shields.io/github/license/alexsandrov16/xbot?style=flat-square)

**xBot** es una librería en PHP diseñada específicamente para simplificar la creación y gestión de bots de Telegram. Con un enfoque en la facilidad de uso y la eficiencia, **xBot** te permite centrarte en lo que realmente importa: implementar funcionalidades innovadoras y personalizadas para sus bots.


## Estado de Desarrollo

> [!CAUTION]
> Ten en cuenta que **xBot** se encuentra actualmente en una etapa de desarrollo. Esto significa que podrías encontrar algunos errores o comportamientos inesperados. Apreciamos tu comprensión y paciencia mientras trabajamos para mejorar la librería.
>
> Estamos comprometidos a lanzar una versión estable lo antes posible. Tu apoyo y *feedback* son esenciales en este proceso, y cada contribución ayuda a hacer de **xBot** una herramienta más robusta y confiable.

## Instalación

```bash
composer require al3x5/xbot
```

## Uso

Antes de empezar a crear código, debes haber creado tu bot en Telegram. 
Puedes seguir las instrucciones en el siguiente enlace: [Instrucciones para crear y configurar un bot en Telegram](https://telegra.ph/Instrucciones-para-crear-y-configurar-un-bot-en-BotFather-03-18).

### Configurar

Para configurar **xBot** puede hacerlo usando la línea de comandos.
```bash
php vendor/bin/xbot
```

### Inicializar

Para inicializar su bot solo debe crear un archivo `.php`.
```php
require_once 'vendor/autoload.php';
$config = require_once 'config.php';

$xbot = new Al3x5\xBot\Bot($config);
$xbot->run();
```

### Enlazar mi bot con Telegram

Ya para este paso debe de tener su bot creado en Telegram mediante [@BotFather](https://t.me/BotFather).
Para enlazar tu bot con la API de Telegram solo tiene que correr un comando y proporcionar la url de tu bot:
```bash
php vendor/bin/xbot hook:set
```

### Crear comandos, callback y conversaciones

Todos los comandos, callback y conversaciones son creados en el directorio `/myproyect/bot`

#### Commands
Para crear comandos personalizados solo debe de ejecutar el siguiente comando en su consola.
```bash
php vendor/bin/xbot telegram:command
```

#### Callbacks
Para la creacion de callbacks pegue la siguiente linea en su consola.
```bash
php vendor/bin/xbot telegram:callback
```

#### Conversations
Con este comando estaremos creando un nuevo flujo conversacional en nuestro bot
```bash
php vendor/bin/xbot telegram:conversation
```

> [!IMPORTATN]
> Siempre que cree un nuevo comando o callback debe de ejecutar el comando register
```bash
php vendor/bin/xbot register
```

## Contribuciones

Si deseas contribuir al desarrollo de **xBot**, aquí hay algunas formas en las que puedes hacerlo:

- Reporta errores o problemas que encuentres.
- Comparte tus ideas y sugerencias.
- Contribuye con código o documentación.


## Licencia
Este proyecto está licenciado bajo la [Licencia MIT](https://github.com/alexsandrov16/xbot/blob/main/LICENSE).

## Contacto
Si tienes alguna pregunta o comentario, no dudes en contactarme a través de [Telegram](http://t.me/alexsadrov16).

---

Gracias por considerar **xBot** para tus proyectos de bots en Telegram. Estamos emocionados de tenerte a bordo y esperamos que disfrutes trabajando con esta librería. ¡Juntos podemos construir algo grande!
