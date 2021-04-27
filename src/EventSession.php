<?php

namespace WA\Events;

use Ramsey\Uuid\Uuid;

class EventSession
{
    public $id;
    public $type;
    public $event;
    public $time;
    public $place;
    public $host;

    public const TYPES = [
        EventType::CHURCH,
        EventType::ADDRESS,
        EventType::PRAYERLINE,
        EventType::ZOOM,
    ];

    public function __construct()
    {
        $this->setId();
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

    public function setType(string $type = null)
    {
        if (!isset($type)) {
            return false;
        }

        $type = str_replace(" ", "", $type);
        $type = strtoupper($type);

        if (in_array($type, EventType::ALL_TYPES)) {
            $this->type = $type;
        }
    }

    public function setEvent(string $event = null)
    {
        if (isset($event) && strlen($event) === 36) {
            $this->event = $event;
        }
    }

    public function setTime(EventTime $time)
    {
        if (isset($time)) {
            $this->time = $time;
        }
    }

    public function setPlace(EventPlace $place)
    {
        if (isset($place)) {
            $this->place = $place;
        }
    }

    /**
     * $hostedby:
     * An organization or person name
     */
    public function setHost(string $hostedby)
    {
        if (isset($hostedby)) {
            $this->host = $hostedby;
        }
    }
}
