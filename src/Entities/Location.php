<?php

namespace Al3x5\xBot\Entities;

/**
 * Location class
 */
class Location extends Base
{
    /**
     * Latitude as defined by the sender
     */
    public float $latitude;

    /**
     * Longitude as defined by the sender
     */
    public float $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public float $horizontal_accuracy;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated; 
     * in seconds. For active live locations only.
     */
    public int $live_period;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     */
    public int $heading;

    /**
     * Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. 
     * For sent live locations only.
     */
    public int $proximity_alert_radius;


    protected function getEntities(): array
    {
        return [];
    }
}
