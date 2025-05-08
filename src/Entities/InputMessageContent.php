<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMessageContent Entity
 */
class InputMessageContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): InputTextMessageContent|InputLocationMessageContent|InputVenueMessageContent|InputContactMessageContent|InputInvoiceMessageContent
    {
        if ($this->hasProperty('message_text')) {
            return new InputTextMessageContent($this->propertys);
        }
        if ($this->hasProperty('title') && $this->hasProperty('address')) {
            return new InputVenueMessageContent($this->propertys);
        }
        if ($this->hasProperty('phone_number')) {
            return new InputContactMessageContent($this->propertys);
        }
        if ($this->hasProperty('title') && $this->hasProperty('playload')) {
            return new InputInvoiceMessageContent($this->propertys);
        }
        return new InputLocationMessageContent($this->propertys);
    }
}
