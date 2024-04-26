<?php

// src/Controller/CalendarController.php

namespace App\Controller;

use App\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\Event;

class NewCalendarEvent extends Event
{
    public const NAME = 'new.calendar.event';

    protected $calendar;

    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function getCalendar(): Calendar
    {
        return $this->calendar;
    }
}

// Après la création de l'événement
$dispatcher->dispatch(new NewCalendarEvent($calendar), NewCalendarEvent::NAME);


class CalendarController extends AbstractController
{
    /**
     * @Route("/calendar", name="calendar_index")
     */
    public function index(): Response
    {
        $calendars = $this->getDoctrine()->getRepository(Calendar::class)->findAll();

        return $this->render('calendar/index.html.twig', [
            'calendars' => $calendars,
        ]);
    }

    /**
     * @Route("/calendar/create", name="calendar_create")
     */
    public function create(Request $request): Response
    {
        
    }

    /**
     * @Route("/calendar/{id}/edit", name="calendar_edit")
     */
    public function edit(Request $request, Calendar $calendar): Response
    {
        
    }

    /**
     * @Route("/calendar/{id}/delete", name="calendar_delete")
     */
    public function delete(Request $request, Calendar $calendar): Response
    {
       
    }
}
