<?php

namespace Al3x5\xBot\Entities;

/**
 * InputInvoiceMessageContent Entity
 * @property string $title;
 * @property string $description;
 * @property string $payload;
 * @property string $provider_token;
 * @property string $currency;
 * @property \LabeledPrice[] $prices;
 * @property int $max_tip_amount;
 * @property \Integer[] $suggested_tip_amounts;
 * @property string $provider_data;
 * @property string $photo_url;
 * @property int $photo_size;
 * @property int $photo_width;
 * @property int $photo_height;
 * @property bool $need_name;
 * @property bool $need_phone_number;
 * @property bool $need_email;
 * @property bool $need_shipping_address;
 * @property bool $send_phone_number_to_provider;
 * @property bool $send_email_to_provider;
 * @property bool $is_flexible;
 */
class InputInvoiceMessageContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
