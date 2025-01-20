<?php

use Al3x5\xBot\xBot;

require_once 'vendor/autoload.php';

$xbot = new xBot([
    'token' => '1234567890:ABCDEFGHIJKLMNOQRSTZ', //YOUR BOT TOKEN
    'name' => 'MyBot', //BOT NAME
    'admins' => [123456789,985632147], //ID's ADMINS
    //''storage' => \Mk4U\Cache\CacheFactory::create('file', ['dir' => 'storage', 'ttl' => 5]),
    //'webhook'=>'https://YOUR_WEBHOOK_URL,
    //'webhook_secret' => 'YOUR_WEBHOOK_SECRET',
    //'db'=>'sqlite:xbot.db',
    'dev' => true, //ENVIRONMENT
    'logs' => 'storage/logs', //LOGS DIR
    //'parse_mode'=>'HTML'
    'handler' => [                       //NAMESPACES COMMANDS
        '/start' => \App\Commands\StartCommand::class,
    ]
]);


$xbot->run();







//Teclados
$inline = [
    [
        [
            'text' => '🎰 Jugar',
            'callback_data' => 'boton1'
        ],
        [
            'text' => '🏦 Banco',
            'callback_data' => 'boton2'
        ]
    ],
    [['text' => '⬅️ Volver', 'callback_data' => 'volver']]
];
$simple=[
    ['🎰 Jugar','🏦 Banco'],
    ['⬅️ Volver']
];
return $this->reply('Hola '.$message->get('from')->username.' listo para articipar en este inmersivo juego', [
    'reply_markup' => \Al3x5\xBot\Keyboard::remove()
]);