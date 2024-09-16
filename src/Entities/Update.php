<?php

namespace Al3x5\xBot\Entities;

/**
 * Update Entity
 */
class Update extends Base
{
    protected function getEntities(): array
    {
        return [
            'message'              => Message::class,
            'edited_message'       => Message::class,
            'channel_post'         => Message::class,
            'edited_channel_post'  => Message::class,
            'chosen_inline_result' => InlineQuery::class,
            'callback_query'       => CallbackQuery::class,

            //private ChatMemberUpdated $my_chat_member;
            //private ChatMemberUpdated $chat_member;
            //private ChatJoinRequest $chat_join_request;
        ];
    }

    /**
     * Tipo de Actualizacion
     */
    public function type(): ?string
    {
        foreach ($this->getEntities() as $key => $value) {
            if (property_exists($this, $key)) {
                return $key;
            }
        }
        return null;
    }
}
