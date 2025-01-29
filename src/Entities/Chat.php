<?php

namespace Al3x5\xBot\Entities;

/**
 * Chat class
 */
class Chat extends Base
{
    /**
     * Unique identifier for this chat.
     * 
     * This number may have more than 32 significant bits and some programming languages 
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, 
     * so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     */
    public int $id;

    /**
     * Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     */
    public string $type;

    /**
     * Optional. Title, for supergroups, channels and group chats
     */
    public string $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available
     */
    public string $username;

    /**
     * Opcional . Nombre de la otra fiesta en una charla privada
     */
    public string $first_name;

    /**
     * Opcional . Apellido de la otra fiesta en una charla privada
     */
    public string $last_name;

    /**
     * Opcional . Es cierto , si el chat de supergrupo es un foro (tiene temas habilitados) 
     */
    public bool $is_forum;

    public function getEntities(): array
    {
        return [];
    }
}
