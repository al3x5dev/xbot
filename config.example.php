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
    'token' => '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11',
    // your bot name without @
    'name' => 'MyBot',
    // list of bot admin id's
    'admins' => [123456789, 985632147],
    // http client to use (By default \Mk4U\Http\Client is used)
    'http_client' => new \Mk4U\Http\Client(),
    // cache handling library used (default is mk4u/cache)
    'cache' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage', 'ttl' => 300]),
    // activate dev environment (default is false)
    'debug' => true,
    // sets the base path of the library
    'abs_path' => __DIR__,
];
