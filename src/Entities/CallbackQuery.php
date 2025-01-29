<?php

namespace Al3x5\xBot\Entities;

/**
 * CallbackQuery class
 */
class CallbackQuery extends Base
{
    /**
     * Unique identifier for this query
     */
    public string $id;
    
    /**
     * Sender
     */
    public User $from;

    /**
     * Optional. Message sent by the bot with the callback button that originated the query
     */
    public MaybeInaccessibleMessage $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     */
    public string $inline_message_id;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with 
     * the callback button was sent. Useful for high scores in games.
     */
    public string $chat_instance;

    /**
     * Optional. Data associated with the callback button. Be aware that the message originated 
     * the query can contain no callback buttons with this data.
     */
    public string $data;

    /**
     * Optional. Short name of a Game to be returned, serves as the unique identifier for the game
     */
    public string $game_short_name;

    public function getEntities(): array
    {
        return [
            'from' => User::class,
            'message' => Message::class,
        ];
    }
}
