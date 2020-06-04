<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="events")
     */
    public function index(EventRepository $repository)
    {
        $events = $repository->findAll();
        // dd($events);
        return $this->render('event/events.html.twig',[
            "events" => $events,
        ]);
    }

    /**
     * @Route("/event/{dateCreated}", name="event_par_date")
     */
    public function eventParDate(EventRepository $repository, $dateCreated)
    {
        $events = $repository->orderByDate($dateCreated);
        dd($dateCreated);
        return $this->render('event/events.html.twig',[
            "events" => $events,
        ]);
    }
  

}
