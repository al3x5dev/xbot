# Command line interface

**xBot** provides a command line interface that makes it easy to create and manage Telegram bots. With this tool, you can generate configuration files, create custom commands, handle callbacks and much more, all from the comfort of your terminal.


## Prerequisites

Before using the command line, make sure you have installed **xBot**. For more details on installation and configuration, see the [Installation and Configuration](install.md) section.


## Available Commands

The following describes the commands available in the **xBot** command line:


### 1. `install`

**Description**: Automatically generates the configuration file `config.php` and all other necessary files and directories.

```bash
php vendor/bin/xbot install
```

Run this command to create the configuration file without having to do it manually. Follow the instructions in the console to complete the configuration.

> [!NOTE]
> In case you have a clean installation of **xBot** this command is automatically triggered by entering `php vendor/bin/xbot` in the console.


### 2. `register`

**Description**: Register all the commands and callbacks created to be available in your bot.

```bash
php vendor/bin/xbot register
```

> [!NOTE]
> This command must be run every time you create a new command or callback.
> Be sure to run it after you have created or modified your commands or callbaks.


### 3. `hook`

**Description**: Commands related to the configuration of your bot's webhook.


#### 3.1. `hook:about`

**Description**: Gets information about the Telegram bot.

```bash
php vendor/bin/xbot hook:about
```


#### 3.2. `hook:info`

**Description**: Gets information about the Telegram bot webhook.

```bash
php vendor/bin/xbot hook:info
```


#### 3.3. `hook:set`

**Description**: Sets the webhook for the Telegram bot.

```bash
php vendor/bin/xbot hook:set
```

> [!NOTE]
> The URL of your webhook must be accessible from the Internet and use `HTTPS`.


#### 3.4. `hook:delete`

**Description**: Deletes the webhook for the Telegram bot.

```bash
php vendor/bin/xbot hook:delete
```


### 4. `telegram`

**Description**: Commands related to creating interactions in Telegram.


#### 4.1. `telegram:callback`

**Description**: Creates a new callback to handle user interactions with buttons in messages.

```bash
php vendor/bin/xbot telegram:callback
```

> [!NOTE]
> Run this command when you need to handle user interactions via buttons in your messages.

> [!TIP]
> The **xBot CLI** has the flexibility to organize your callback in subfolders within the `bot/Callback` directory.
> Just specify in the callback name when prompted the name of the directory or directories to create as follows `Users/Admin`, this will create the following structure `bot/Callback/Users/Admin.php`.


#### 4.2. `telegram:command`

**Description**: Create a new custom command for your bot.

```bash
php vendor/bin/xbot telegram:command
```

> [!NOTE]
> Use this command to add a new command that users can invoke in Telegram.

> [!TIP]
> The **xBot CLI** has the flexibility to organize your commands in subfolders within the `bot/Commands` directory.
> Just specify in the command name when prompted the name of the directory or directories to create as follows `Users/Admin/Start`, this will create the following structure `bot/Commands/Users/Admin/Start.php`.


#### 4.3. `telegram:conversation`

**Description**: Create a new conversational stream for your bot.

```bash
php vendor/bin/xbot telegram:conversation
```

> [!NOTE]
> Use this command when you want to implement a more complex conversation flow in your bot, allowing users to interact more dynamically.

> [!TIP]
> The **xBot CLI** has the flexibility to organize your conversational flows in subfolders within the `bot/Conversation` directory.
> Just specify in the conversation name when prompted the name of the directory or directories to create as follows `Users/Admin/Create`, this will create the following structure `bot/Conversation/Users/Admin/Create.php`.


#### 4.4. `telegram:handler`

**Description**: Create a new custom handler for yu bot.

```bash
php vendor/bin/xbot telegram:handler
```

> [!NOTE]
> Use this command when you want to implement custom handlers for different types of Telegram bot updates.

> [!TIP]
> The **xBot CLI** allows you to organize handlers into subfolders within the `bot/Handlers` directory.
> Simply specify the name of the directory or directories to be created in the handler name when prompted, such as `Admin/ChannelPost`. This will create the following structure: `bot/Handler/Admin/ChannelPost.php`.