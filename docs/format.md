# FormatHelper

La clase `FormatHelper` proporciona métodos estáticos para aplicar diferentes formatos a textos en mensajes de Telegram. Estos formatos incluyen negritas, cursivas, subrayados, tachados, spoilers, enlaces, menciones de usuario, emojis personalizados, bloques de código y citas. Esta clase es útil para dar formato a los mensajes que se envían a través de un bot de Telegram, mejorando la presentación y la legibilidad de los mismos.

## Métodos

### bold(string $text): string

Formatea el texto proporcionado en negritas.

```php
$this->reply(FormatHelper::bold('Este texto estará en negritas'));
// Salida: <b>Este texto estará en negritas</b>
```


### italic(string $text): string

Formatea el texto proporcionado en cursiva.

```php
$this->reply(FormatHelper::italic('Este texto estará en cursiva'));
// Salida: <i>Este texto estará en cursiva</i>
```


### underline(string $text): string

Formatea el texto proporcionado subrayado.

```php
$this->reply(FormatHelper::underline('Este texto estará subrayado'));
// Salida: <u>Este texto estará subrayado</u>
```


### strikethrough(string $text): string

Formatea el texto proporcionado con un tachado.

```php
$this->reply(FormatHelper::strikethrough('Este texto estará tachado'));
// Salida: <s>Este texto estará tachado</s>
```


### spoiler(string $text): string

Formatea el texto proporcionado como un spoiler.

```php
$this->reply(FormatHelper::spoiler('Este texto será un spoiler'));
// Salida: <tg-spoiler>Este texto será un spoiler</tg-spoiler>
```


### link(string $text, string $url): string

Formatea el texto proporcionado como un enlace.

```php
$this->reply(FormatHelper::link('Haz clic aquí', 'https://ejemplo.com'));
// Salida: <a href="https://ejemplo.com">Haz clic aquí</a>
```


### mention(string $text, int $userId): string

Formatea el texto proporcionado como una mención de usuario.

```php
$this->reply(FormatHelper::mention('@usuario', 123456789));
// Salida: <a href="tg://user?id=123456789">@usuario</a>
```


### emoji(string $emoji, string $emojiId): string

Formatea el texto proporcionado como un emoji personalizado.

```php
$this->reply(FormatHelper::emoji('😊', '1234567890'));
// Salida: <tg-emoji emoji-id="1234567890">😊</tg-emoji>
```


### inlineCode(string $text): string

Formatea el texto proporcionado como un código en línea.

```php
$this->reply(FormatHelper::inlineCode('código en línea'));
// Salida: <code>código en línea</code>
```


### codeBlock(string $text, string $language = ''): string

Formatea el texto proporcionado como un bloque de código.

```php
$this->reply(FormatHelper::codeBlock('código en bloque', 'php'));
// Salida: <pre><code class="language-php">código en bloque</code></pre>
```


### blockQuote(string $text): string

Formatea el texto proporcionado como una cita en bloque.

```php
$this->reply(FormatHelper::blockQuote('Esta es una cita en bloque'));
// Salida: <blockquote>Esta es una cita en bloque</blockquote>
```


### expandableBlockQuote(string $text): string

Formatea el texto proporcionado como una cita en bloque expandible.

```php
$this->reply(FormatHelper::expandableBlockQuote('Esta es una cita en bloque expandible'));
// Salida: <blockquote expandable>Esta es una cita en bloque expandible</blockquote>
```


### sanatize(string $text): string

Sanea el texto proporcionado, escapando caracteres especiales HTML.

```php
$this->reply(FormatHelper::sanatize('<script>alert("Hola")</script>'));
// Salida: &lt;script&gt;alert(&quot;Hola&quot;)&lt;/script&gt;
```