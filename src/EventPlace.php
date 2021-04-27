<?php

namespace WA\Events;

use Ramsey\Uuid\Uuid;
use WA\Parser\Address;

class EventPlace
{
    public $id;
    public $name;
    public $address;

    public function __construct(string $name, string $address)
    {
        $this->setId();

        if (isset($name)) {
            $this->name = trim($name);
        }

        if (isset($address)) {
            $this->address = new Address($address);
        }
    }

    public function setId(string $id = null)
    {
        if (isset($id) && strlen($id) === 36) {
            /**
             * Set Event ID
             */
            $this->id = $id;
            return;
        }

        /**
         * Create new Event ID
         */
        $uuid = Uuid::uuid4();
        $this->id = $uuid->toString();
    }

    public function getId()
    {
        return $this->id;
    }
}
