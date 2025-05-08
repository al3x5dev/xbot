<?php

namespace Al3x5\xBot\Entities;

/**
 * InputVenueMessageContent Entity
 * @property float $latitude;
 * @property float $longitude;
 * @property string $title;
 * @property string $address;
 * @property string $foursquare_id;
 * @property string $foursquare_type;
 * @property string $google_place_id;
 * @property string $google_place_type;
 */
class InputVenueMessageContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
