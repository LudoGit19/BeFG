<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
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
     * @route("/modif/event", name="modif_event")
     * 
     */

    public function modifEvent(Event $event = null, Request $request, EntityManagerInterface $entityManager){

        if(!$event) {
            $event = new Event();
        }

        $form = $this->createForm(EventType::class, $event); // cette action lie le form ) l'objet $player      
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){          
            $modif = $event->getId() !== null;
            $entityManager->persist($event);
            $entityManager->flush();
            $this->addFlash("success", ($modif) ? "La modification de l'évènement a été effectuée" : "L'ajout du joueur a été effectué");
            return $this->redirectToRoute("admin");
        }

        return $this->render('admin/modifEvent.html.twig', [
            "event" => $event,
            "formEvent" => $form->createView()

        ]);
    }

}
