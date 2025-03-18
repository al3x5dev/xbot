<?php

namespace Al3x5\xBot\Entities;

/**
 * User class
 * 
 * @property public int $id
 * @property public bool $is_bot
 * @property public string $first_name
 * @property public string $last_name
 * @property public string $username
 * @property public string $language_code
 * @property public bool $is_premium
 * @property public bool $added_to_attachment_menu
 * @property public bool $can_join_groups
 * @property public bool $can_read_all_group_messages
 * @property public bool $supports_inline_queries
 * @property public bool $can_connect_to_business
 * @property public bool $has_main_web_app
 */
class User extends Base
{
    protected function getEntities(): array
    {
        return [];
    }
}
