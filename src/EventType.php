<?php

namespace WA\Events;

class EventType
{
    public const CHURCH = "CHURCH";
    public const ADDRESS = "ADDRESS";
    public const PRAYERLINE = "PRAYERLINE";
    public const ZOOM = "ZOOM";

    public const ALL_TYPES = [
        self::CHURCH,
        self::ADDRESS,
        self::PRAYERLINE,
        self::ZOOM,
    ];
}
