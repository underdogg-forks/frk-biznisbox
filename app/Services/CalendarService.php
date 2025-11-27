<?php

namespace App\Services;

use App\Models\CalendarEvent;

class CalendarService
{
    public function __construct(
        private readonly CalendarEvent $calendarEvent
    ) {
    }

    public function getEvents($user, $start, $end)
    {
        $user = $user ?? auth()->id();

        return $this->calendarEvent->getEventsByUser($user, $start, $end);
    }

    public function createEvent($data)
    {
        return $this->calendarEvent->createEvent($data);
    }

    public function updateEvent($id, $data)
    {
        return $this->calendarEvent->updateEvent($id, $data);
    }

    public function deleteEvent($id)
    {
        return $this->calendarEvent->deleteEvent($id);
    }

    public function getEvent($id)
    {
        return $this->calendarEvent->getEvent($id);
    }
}
