<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * WebhookInfo Entity
 * @property string $url
 * @property bool $has_custom_certificate
 * @property int $pending_update_count
 * @property string $ip_address
 * @property int $last_error_date
 * @property string $last_error_message
 * @property int $last_synchronization_error_date
 * @property int $max_connections
 * @property string $allowed_updates
 */
class WebhookInfo extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
