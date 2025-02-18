<?php

/**
 * This file contains all the configuration options for xBot.
 *
 * Simply adjust all the values that you need and extend where necessary.
 */

/**
 * The client and storage parameters do not need to be specified unless you want 
 * to use a different library for cache or http handling.
 */

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
    'storage' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage', 'ttl' => 300]),
    // activate dev environment (default is false)
    'dev' => true,
    // directory where logs are stored
    'logs' => 'storage/logs',
    // parsing mode for telegram messages
    'parse_mode'=>'MarkdownV2',
];
