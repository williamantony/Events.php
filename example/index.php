<?php

require dirname(__DIR__) . "/vendor/autoload.php";

$event = new WA\Events\Event("IPA Prayerline");
$session = new WA\Events\EventSession();
$time = new WA\Events\EventTime();

$time->setStart("04/18/2021 10:00 AM");
$time->setEnd("04/19/2021 10:00 AM");
// $time->setDuration("10 days");

$place = new WA\Events\EventPlace(
    "International Pentecostal Assembly",
    "6200 W Foster Ave, Chicago, IL 60630, USA"
);

$session->setType("zoom");
$session->setHost("IPA Chicago");

$session->setTime($time);
$session->setPlace($place);
$event->addSession($session);

print_r($event);
