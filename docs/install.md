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
    // your bot token
    'token' => '1234567890:ABCDEFGHIJKLMNOQRSTZ',
    // your bot name without @
    'name' => 'MyBot',
    // list of bot admin id's
    'admins' => [123456789, 985632147],
    // http client to use (By default \Mk4U\Http\Client is used)
    'client' => new \Mk4U\Http\Client(),
    // cache handling library used (default is mk4u/cache)
    'storage' => \Mk4U\CacheFactory::create('file', ['dir' => 'storage/cache', 'ttl' => 300]),
    // activate dev environment (default is false)
    'dev' => true,
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
php vendor/bin/xbot hook:set
```

This command will prompt you to enter the URL of your webhook. Make sure that this URL is accessible from the Internet and that it points to your server where the bot is hosted.

> [!IMPORTANT]
> On Linux systems, it is important to configure the permissions for the `storage` directory.

```bash
sudo chown -R www-data:www-data /var/www/html/my_bot/storage
sudo chmod -R 775 /var/www/html/my_bot/storage
```

## Initialize the Bot

Once you have configured your config.php file and set up the webhook, you can initialize your bot. Create a `.php` file in the root of your project and add the following code, this will be the starting point of your bot.

```php
require_once 'vendor/autoload.php';

$xbot = new \Al3x5\xBot\Bot();
$xbot->run();
```