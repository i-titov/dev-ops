<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/calendar-events", name="calendar_events")
     */
    public function calendarEvents(): JsonResponse
    {
        // Générez vos données d'événements ici, par exemple à partir d'une base de données
        $events = [
            [
                'title' => 'Événement 1',
                'start' => '2024-04-27',
            ],
            [
                'title' => 'Événement 2',
                'start' => '2024-04-28',
            ],
            // Ajoutez d'autres événements si nécessaire
        ];

        return new JsonResponse($events);
    }
}
