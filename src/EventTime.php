<?php

namespace WA\Events;

use Ramsey\Uuid\Uuid;

class EventTime
{
    public $id;
    public $start;
    public $end;
    public $duration;

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

    public function setStart($dateTime)
    {
        if (is_string($dateTime)) {
            $dateTime = new \DateTime($dateTime);
        }

        if ($dateTime instanceof \DateTime) {
            $this->start = $dateTime;
        }
    }

    public function setEnd($dateTime)
    {
        if (is_string($dateTime)) {
            $dateTime = new \DateTime($dateTime);
        }

        if ($dateTime instanceof \DateTime) {
            $this->end = $dateTime;
        }
        /**
         * Calculate Duration
         * after the end time is set
         */
        $this->setDuration();
    }

    /**
     * $modifier is time modifying string
     * like "2 days"
     */
    public function setDuration(string $modifier = null)
    {

        if (!$this->start instanceof \DateTime) {
            return false;
        }

        /**
         * Create End Date
         */

        $startTz = $this->start->getTimestamp();

        if (isset($modifier)) {
            $date = new \DateTime();
            $date->setTimestamp($startTz);
            $date->modify($modifier);

            $this->end = $date;
        }

        /**
         * Calculate Duration
         */
        $endTz = $this->end->getTimestamp();
        $duration = $endTz - $startTz;

        $this->duration = $duration;

        return true;
    }

}
