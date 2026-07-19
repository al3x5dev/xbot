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

use Al3x5\xBot\Telegram\Actions\Callbacks;
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
> Always extend `Al3x5\xBot\Telegram\Actions\Callbacks`.

### Register

[To register your callbacks](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md#2-register), just type in console:

```bash
php vendor/bin/xbot register
```
This will ensure that all custom callbacks are available for use in the bot.

## Using parameters in callbacks

xBot supports **dynamic callback routing** using the `|` (pipe) separator. This allows you to pass parameters directly in the callback data without registering each variation.

### How it works

When a callback query arrives, the router first tries to match the **exact callback data**. If no exact match is found, it splits the data by `|` and uses the first segment as the action key to find the handler. The second segment (after `|`) is then passed to the handler via `setParam()`.

> Example: `callback_data = "join_game|42"` → routes to the handler registered as `join_game` with param `"42"`.

### Example

**Creating a callback with parameter support:**

```php
namespace MyBot\Callbacks;

use Al3x5\xBot\Telegram\Actions\Callbacks;
use Al3x5\xBot\Attributes\Callback;

#[Callback('join_game')]
class JoinGame extends Callbacks
{
    public function execute(): void
    {
        $gameId = $this->getParam();

        $this->reply("You joined game #$gameId");
    }
}
```

**Sending the inline button:**

```php
$button = InlineButton::make('Join Game')
    ->callback('join_game|42');
```

The handler receives `42` via `$this->getParam()`.

### Methods

- **`setParam(?string $param): static`** — Sets the callback parameter (returns `$this` for fluent interface).
- **`getParam(): ?string`** — Returns the callback parameter, or `null` if no parameter was provided.