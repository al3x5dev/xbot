<?php

return [
    'token' => env('BOT_TOKEN'),
    'name' => env('BOT_NAME'), //BOT NAME
    'admins' => env('ID_ADMINS'),//[123456789,985632147], //ID's ADMINS
    //'storage'=> CacheFactory::create('apcu'),
    //'webhook'=>'https://YOUR_WEBHOOK_URL,
    //'webhook_secret' => 'YOUR_WEBHOOK_SECRET',
    //'db'=>'sqlite:xbot.db',
    'dev' => true, //ENVIRONMENT
    'logs' => __DIR__ . '/logs', //LOGS DIR
    //'parse_mode'=>'HTML'
    //'handler'=>[] //NAMESPACES COMMANDS
];