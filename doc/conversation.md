# Conversational Flows


## what is a conversational flow

Conversational flows are the structure and design of how the conversation between the user and the bot takes place. This includes how commands are handled, bot responses, and how callbacks are used to guide the user through different stages of the interaction.

### A conversational flow may include:

- **Questions and answers:** The bot asks questions and expects answers from the user.
- **Decisions:** Based on the user's responses, the bot can take different paths in the conversation.
- **Context:** Maintain the context of the conversation so that the bot can provide relevant answers.


## Creating conversation

**xBot** has an integrated [cli tool](https://github.com/alexsandrov16/xbot/blob/main/doc/cli.md) for managing your bots. Through it, we can create conversation. Just run the following command in your console:

```bash
php vendor/bin/xbot telegram:conversation
```

This will create your new conversation inside the `bot/Conversations` folder in the root directory of your project.


### Basic example

Here is a basic conversation structure for you to understand how to write a simple conversation class.

```php
namespace MyBot\Conversations;

use Al3x5\xBot\Conversations;

class Foo extends Conversations
{
    public function execute(array $params=[]): void
    {
        $this->reply('Conversation executed');
    }
}
```


### Register

[To register your conversations](https://github.com/alexsandrov16/xbot/blob/main/doc/cli.md#2-register), just type in console:

```bash
php vendor/bin/xbot register
```
This will ensure that all custom conversations are available for use in the bot.