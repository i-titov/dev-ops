<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\NewCalendarEvent;

class CalendarEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            NewCalendarEvent::NAME => 'onNewCalendarEvent',
        ];
    }

    public function onNewCalendarEvent(NewCalendarEvent $event)
    {
        $calendar = $event->getCalendar();
        // Traitez le nouvel événement du calendrier ici
    }
}
