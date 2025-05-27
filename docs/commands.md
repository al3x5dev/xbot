# Command System


## What are telegram commands?

Commands are instructions that users can send to the bot to perform specific actions. They start with a forward slash (/) and can be customized according to the bot's needs. 


### Basic Commands
- `/start`: Starts the interaction with the bot.
- `/help`: Provides information on how to use the bot.
- `/settings`: Allows the user to adjust settings.


### Custom Commands
In **xBot**, we also consider any pre-specified text or words as commands. For example:
- `📥 download`: Download file.
- `🎮 game`: Start a game.

This variant is most commonly used for custom keyboard actions, allowing a more fluid and dynamic interaction with the user.


## Create commands

xBot has an integrated [cli tool](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md) for managing your bots. Through it, we can create custom commands. Just run the following command in your console:

```bash
php vendor/bin/xbot telegram:command
```

This will create your new command inside the bot/Commands folder in the root directory of your project.


### Basic example

Here is a basic command structure for you to understand how to write a simple command class.

```php
namespace MyBotCommands;

use Al3x5xBotCommands;

use Al3x5Bottributes command;

#[Command('/start')]
class Start extends Commands
{
    public function execute(...$params): void
    {
        $this->reply('Hey, there! Welcome to our bot!');
    }
    
    public function getDescription(): string
    {
        return 'Start Command to get you started';
    }
}
```


#### Required properties and method:

- All commands extend from the abstract class `Al3x5BotCommands` so they inherit from it the properties `$message` and `$update`, both properties represent the entities `Al3x5BotEntitiesMessage` and `Al3x5BotEntitiesUpdate` respectively.
- Each command is passed the `Command` attribute which represents the name of the command. This is used to identify the command when the user sends a message to the bot. In this case, the name is set to `start`, so the command will be activated when the user sends `/start`.
- The `execute()` method is the heart of the command and defines the action to be executed when the command is triggered. In this case, it simply sends a welcome message to the user when the /start command is issued.
- The `getDescription()` method returns a string that provides a brief description of the command's purpose, typically used to get the description of each available command.


### Register

[To register your commands](https://github.com/alexsandrov16/xbot/blob/main/docs/cli.md#2-register), just type in console:

```bash
php vendor/bin/xbot register
```
This will ensure that all custom commands are available for use in the bot.