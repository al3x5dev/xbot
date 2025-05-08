<?php

namespace Al3x5\xBot\Entities;

/**
 * WebhookInfo Entity
 * @property string $url;
 * @property bool $has_custom_certificate;
 * @property int $pending_update_count;
 * @property string $ip_address;
 * @property int $last_error_date;
 * @property string $last_error_message;
 * @property int $last_synchronization_error_date;
 * @property int $max_connections;
 * @property array $allowed_updates;
 */
class WebhookInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
