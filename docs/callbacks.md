## Callbacks


## What are callbacks?

Callbacks are responses that the bot sends in response to user actions, especially when [inline buttons](https://github.com/alexsandrov16/xbot/blob/main/docs/keyboards.md) are used. When a user clicks on a button, a **callback query** is sent to the bot, which can process that action and respond accordingly.

## Creating callbacks

xBot has an integrated [cli tool](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md) for managing your bots. Through it, we can create callbacks. Just run the following command in your console:

```bash
php vendor/bin/xbot telegram:callback
```

This will generate a new callback class inside the `bot/Callbacks` folder in your project root.


### Basic example

Here is an example of a simple callback:

```php
namespace MyBot\Callbacks;

use Al3x5\xBot\Callbacks;
use Al3x5\xBot\Attributes\Callback;

#[Callback('hello')]
class Greetings extends Callbacks
{
    public function execute(): void
    {
        $this->reply('You pressed the hello button');

        // Access the associated message
        $messageEntity = $this->message(); // returns Message|InaccessibleMessage
        // Example: $chatId = $messageEntity->getChat()->getId();
    }
}
```

> [!NOTE]
> `$this->message()` replaces the old `$this->getMessage()` method.
> It resolves the `MaybeInaccessibleMessage` or `InaccessibleMessage` automatically.
> Always extend `Al3x5\xBot\Callbacks`.

### Register

[To register your callbacks](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md#2-register), just type in console:

```bash
php vendor/bin/xbot register
```
This will ensure that all custom callbacks are available for use in the bot.