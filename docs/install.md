# Installation and Configuration


## Installation

To install **xBot**, make sure you have [Composer](https://getcomposer.org/) installed on your system. Composer is a dependency manager for PHP that will allow you to easily install and manage your project's libraries.

Once you have Composer installed, you can add **xBot** to your project by running the following command in the terminal:

```bash
composer require al3x5/xbot
```


## Configuration

After installing **xBot**, you will need to create a configuration file for your bot. This file will contain the information needed to connect your bot to the Telegram API. You have two options for creating this configuration file:

### 1. Manual Method

You can create the configuration file manually by following these steps:

1. Create a file named `config.php` in the root of your project.
2. Open the file and add the following basic configuration, see [config.example.php](https://github.com/alexsandrov16/xbot/blob/main/config.example.php):

```php
return [
    // your bot token (required)
    'token' => '1234567890:ABCDEFGHIJKLMNOQRSTZ',
    // webhook secret token (optional but recommended)
    // This adds an extra layer of security to your webhook
    // Telegram will send this token in the X-Telegram-Bot-Api-Secret-Token header
    'secret' => 'your_secret_token_here',
    // list of bot admin id's
    'admins' => [123456789, 985632147],
    // http client to use (By default \Mk4U\Http\Client is used)
    'http_client' => new \Mk4U\Http\Client(),
    // cache handling library used (default is mk4u/cache)
    'cache' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage/cache', 'ttl' => 300]),
    // activate dev environment (default is false)
    'debug' => true,
    // sets the base path of the library
    'abs_path' => __DIR__,
];
```

> [!IMPORTANT]
> Use this method only to modify or add some necessary configuration parameters.
> We do not recommend using this method for a clean installation of **xBot**.

### 2. Automatic Method (**_Recommended_**)

**xBot** allows you to generate the configuration file automatically through the command line, in addition to generating the necessary directory structure and other configuration files for its first use.

To do this, run the following command in the terminal:

```bash
php vendor/bin/xbot
```

This command will guide you through the installation and initial configuration process. Be sure to follow the instructions that will appear in the console to complete the configuration.


### Obtain the API Key

Regardless of the method you choose, you will need to get the API Key of your bot. To do so, follow these steps:

- Open Telegram and search for the bot [@BotFather](https://t.me/BotFather).
- Start a conversation with BotFather and use the `/newbot` command to create a new bot.
- Follow the instructions and at the end you will receive an API token. Copy this token and paste it in the `token` field of your config.php file or in the console when prompted.


### Configure the Webhook

In order for your bot to receive updates from Telegram, you will need to set up a webhook. This can be done by running the following command in the terminal:

```bash
php vendor/bin/xbot hook:set https://your-domain.com/webhook
```

This command will prompt you to enter the URL of your webhook. Make sure that this URL is accessible from the Internet and that it points to your server where the bot is hosted.

> [!IMPORTANT]
> When you set the webhook, xBot automatically includes your secret token if configured. Telegram will use this token in the `X-Telegram-Bot-Api-Secret-Token` header with every request.

#### Webhook Security

xBot validates the `X-Telegram-Bot-Api-Secret-Token` header on every incoming request. If you configured a `secret` in your `config.php`, the bot will reject any request that doesn't include the correct token.

To disable webhook security, simply remove or set to `null` the `secret` key in your configuration file.

> [!NOTE]
> The webhook URL must use HTTPS. Telegram requires a valid SSL certificate.

> [!IMPORTANT]
> On Linux systems, it is important to configure the permissions for the `storage` directory.

```bash
sudo chown -R www-data:www-data /var/www/html/my_bot/storage
sudo chmod -R 775 /var/www/html/my_bot/storage
```

### Verify Installation

After installation, you can verify your bot is working by running:

```bash
php vendor/bin/xbot hook:about
```

This will display information about your bot including the username and whether the webhook is properly configured.

Once you have configured your config.php file and set up the webhook, you can initialize your bot. Create a `.php` file in the root of your project and add the following code, this will be the starting point of your bot.

```php
require_once 'vendor/autoload.php';

$xbot = new \Al3x5\xBot\Bot();
$xbot->run();
```

## Running Tests

xBot includes a PHPUnit test suite. To run the tests:

```bash
# Run all tests
./vendor/bin/phpunit

# Run specific test file
./vendor/bin/phpunit tests/EntityTest.php

# Run with coverage
./vendor/bin/phpunit --coverage-html coverage
```

### Test Structure

```
tests/
├── ApiClientTest.php    # Tests for API client
├── ConfigTest.php      # Tests for configuration
├── EntityTest.php      # Tests for entity system
└── storage/           # Test data files
```

> [!NOTE]
> Tests are automatically included via Composer when you install xBot as a dependency.

## Project Structure

After installation, your xBot project will have the following structure:

```
xbot-project/
├── bot/
│   ├── Commands/          # Bot commands
│   ├── Callbacks/        # Inline callback handlers
│   ├── Conversations/    # Conversation flows
│   ├── Handlers/         # Update handlers (InlineQuery, ChannelPost, etc.)
│   └── Middlewares/      # Middleware classes
├── src/                  # xBot library source
├── storage/
│   ├── cache/            # Cache files
│   ├── commands.json     # Registered commands
│   └── callbacks.json   # Registered callbacks
├── vendor/              # Composer dependencies
├── index.php            # Bot entry point
├── config.php           # Bot configuration
└── composer.json        # Dependencies
```

## Core Components

| Component | Description |
|-----------|-------------|
| **Bot** | Main class that handles incoming updates |
| **Commands** | Handle user commands (e.g., /start, /help) |
| **Callbacks** | Handle inline button interactions |
| **Handlers** | Handle special update types (inline queries, channel posts, etc.) |
| **Conversations** | Multi-step conversation flows |
| **Middlewares** | Pre-processing pipeline for updates |