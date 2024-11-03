<?php

namespace Al3x5\Tests\Conversations;

use Al3x5\xBot\Conversation;
use Al3x5\xBot\Events;
use Al3x5\xBot\Telegram;

/**
 * undocumented class
 */
class HelloConversation extends Conversation
{
    public function execute(): Telegram
    {
        $name = $this->bot->update->get('message')->text;
        return $this->say("🙃 $name, bonito nombre 🤭 cuantos años tienes\?", self::class, 'edad');
    }

    public function edad(): Telegram
    {
        $this->bot->stopConversation();
        $edad = $this->bot->update->get('message')->text;
        $this->bot->reply(" $edad años mmmm 😏 delicioso  ");
        $this->bot->sendChatAction([
                'chat_id' => $this->bot->getChatId(),
                'action' => 'choose_sticker'
            ]);
        return $this->bot->sendSticker([
            'chat_id' => $this->bot->getChatId(),
            'sticker' => 'CAACAgIAAxkBAAJ08WbiJBoHU1o3n_kLd0ukSEbD0X87AAJXAQACUomRI2PQZHzbAAEqTDYE'
        ]);
    }
}
