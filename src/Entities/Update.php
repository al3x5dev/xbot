<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Update Entity
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
 * @property MessageReactionCountUpdated $message_reaction_count
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
class Update extends Entity
{
    protected function setEntities(): array
    {
        return [
            'message' => Message::class,
            'edited_message' => Message::class,
            'channel_post' => Message::class,
            'edited_channel_post' => Message::class,
            'business_connection' => BusinessConnection::class,
            'business_message' => Message::class,
            'edited_business_message' => Message::class,
            'deleted_business_messages' => BusinessMessagesDeleted::class,
            'message_reaction' => MessageReactionUpdated::class,
            'message_reaction_count' => MessageReactionCountUpdated::class,
            'inline_query' => InlineQuery::class,
            'chosen_inline_result' => ChosenInlineResult::class,
            'callback_query' => CallbackQuery::class,
            'shipping_query' => ShippingQuery::class,
            'pre_checkout_query' => PreCheckoutQuery::class,
            'purchased_paid_media' => PaidMediaPurchased::class,
            'poll' => Poll::class,
            'poll_answer' => PollAnswer::class,
            'my_chat_member' => ChatMemberUpdated::class,
            'chat_member' => ChatMemberUpdated::class,
            'chat_join_request' => ChatJoinRequest::class,
            'chat_boost' => ChatBoostUpdated::class,
            'removed_chat_boost' => ChatBoostRemoved::class,
        ];
    }

    /**
 * Tipo de Actualizacion
 */
public function type(): ?string
{
    foreach ($this->setEntities() as $key => $v) {
        if ($this->hasProperty($key)) {
            return $key;
        }
    }
    return null;
}
}
