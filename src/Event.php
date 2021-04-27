<?php

namespace WA\Events;

use Ramsey\Uuid\Uuid;

class Event
{
    public $id;
    public $name;
    public $sessions = [];

    public function __construct(string $name)
    {
        $this->setId();
        $this->setName($name);
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

    public function setName(string $name)
    {
        if (isset($name)) {
            $this->name = trim($name);
        }
    }

    public function addSession(EventSession $session)
    {
        if (isset($session)) {
            $session->setEvent($this->id);
            $this->sessions[] = $session;
        }
    }
}
