<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMessageContent Entity
 */
class InputMessageContent extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

        protected function resolve(): Entity
    {
        if($this->hasProperty('message_text')){
            return new InputTextMessageContent($this->properties);
        }
        if($this->hasProperty('phone_number')){
            return new InputContactMessageContent($this->properties);
        }
        if($this->hasProperty('payload')){
            return new InputInvoiceMessageContent($this->properties);
        }
        if(
            $this->hasProperty('latitude') && 
            $this->hasProperty('longitude') && 
            $this->hasProperty('title')
        ){
            return new InputVenueMessageContent($this->properties);
        }
        if (
            $this->hasProperty('latitude') &&
            $this->hasProperty('longitude')
        ) {
            return new InputLocationMessageContent($this->properties);
        }
        throw new \InvalidArgumentException('Unknown InputMessageContent');
    }
}
