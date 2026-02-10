# Conversational Flows


## what is a conversational flow

Conversational flows are the structure and design of how the conversation between the user and the bot takes place. This includes how commands are handled, bot responses, and how callbacks are used to guide the user through different stages of the interaction.

### A conversational flow may include:

- **Questions and answers:** The bot asks questions and expects answers from the user.
- **Decisions:** Based on the user's responses, the bot can take different paths in the conversation.
- **Context:** Maintain the context of the conversation so that the bot can provide relevant answers.


## Creating conversation

**xBot** has an integrated [cli tool](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md) for managing your bots. Through it, we can create conversation. Just run the following command in your console:

```bash
php vendor/bin/xbot telegram:conversation
```

This will create your new conversation inside the `bot/Conversations` folder in the root directory of your project.


### Basic example

Below is a basic example that shows how a conversational flow is implemented in xBot.

Every conversation must extend `Al3x5\xBot\Conversations` and define a `start()` method.

```php
namespace MyBot\Conversations;

use Al3x5\xBot\Conversations;

class Foo extends Conversations
{
    public function start(): void
    {
        $this->reply('Conversation started');
        $this->stopConversation();
    }
}
```

### How conversations work

1. A conversation is started manually by calling `start()`
2. The bot sends a message using `ask()`
3. The current step is saved in cache (chat_id:user_id)
4. On the next user message:
    - xBot detects an active conversation
    - Loads the conversation class
    - Executes the stored step method
5. The flow continues until `stopConversation()` is called or the user cancels it

### Conversation control methods

#### `end(string ...$words): void`

Defines one or more words or commands that immediately cancel the active conversation.

If the user sends any of these words:
- The conversation cache is deleted
- The conversation stops instantly
- If the text is a command, it will be executed normally

##### Example:

```php
public function start(): void
{
    $this->end('/cancel', 'exit');

    $this->ask(
        'What is your name?',
        'getName'
    );
}
```

#### `fallback(): void`

Optional method executed when an error occurs during the conversation flow.

This method can be used to:
- Notify the user about a failure
- Recover gracefully
- Log errors or reset state

##### Example:

```php
public function fallback(): void
{
    $this->reply('Something went wrong, please try again.');
}
```

### Example: Simple multi-step conversation

```php
namespace Bot\Conversations;

use Al3x5\xBot\Conversations;

class Hello extends Conversations
{
    public function fallback(): void
    {
        $this->reply('Something went wrong');
    }

    public function start(): void
    {
        // Cancel words or commands
        $this->end('exit');

        // Step 1
        $this->ask(
            'What is your name?',
            'getName'
        );
    }

    public function getName(): void
    {
        $name = $this->update->getMessage()->getText();

        $this->ask(
            "Hello $name, how old are you?",
            'getAge'
        );
    }

    public function getAge(): void
    {
        $age = $this->update->getMessage()->getText();

        $this->reply("Perfect, you are $age years old");
        $this->stopConversation();
    }
}
```

### Starting a conversation

To start a conversation, simply instantiate the class and call `start()`:

```php
use Bot\Conversations\Hello;
$cv = new Hello($this->update);
$cv->start();
```

Once started, xBot automatically handles routing future messages to the correct step.