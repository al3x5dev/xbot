<?php

namespace Al3x5\xBot\Entities;

/**
 * Update Entity
 * 
 * @property int $update_id
 * @property Message $message
 * @property Message $edited_message
 * @property Message $channel_post
 * @property Message $edited_channel_post
 * @property BusinessConnection $business_connection
 * @property Message $business_message
 * @property Message $edited_business_message
 * @property BusinessMessagesDeleted $deleted_business_messages
 * @property MessageReactionUpdated $message_reaction
 * @property MessageReactionCount $message_reaction_count
 * @property InlineQuery $inline_query
 * @property ChosenInlineResult $chosen_inline_result
 * @property CallbackQuery $callback_query
 * @property ShippingQuery $shipping_query
 * @property PreCheckoutQuery $pre_checkout_query
 * @property PaidMediaPurchased $purchased_paid_media
 * @property Poll $poll
 * @property PollAnswer $poll_answer
 * @property ChatMemberUpdated $my_chat_member
 * @property ChatMemberUpdated $chat_member
 * @property ChatJoinRequest $chat_join_request
 * @property ChatBoostUpdated $chat_boost
 * @property ChatBoostRemoved $removed_chat_boost
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
            if (isset($this->$key)) {
                return $key;
            }
        }
        return null;
    }
}
