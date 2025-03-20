<?php

namespace Al3x5\xBot\Entities;

/**
 * WebhookInfo class
 * 
 * @property string $url;
 * @property bool $has_custom_certificate;
 * @property int $pending_update_count;
 * @property string|null $ip_address;
 * @property int|null $last_error_date;
 * @property string|null $last_error_message;
 * @property int|null $max_connections;
 * @property string[]|null $allowed_updates;
 */
class WebhookInfo extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}