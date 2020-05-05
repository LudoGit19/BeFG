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
        return $this->render('event/indexEvents.html.twig',[
            "events" => $events,
        ]);
    }
    
    /**
     * @route("/admin/creation", name="admin_ajout_event")
     * 
     */

    public function ajoutEvent(Event $event, Request $request, EntityManagerInterface $entityManager){

        if(!$event) {
            $event = new Event();
        }

        $form = $this->createForm(EventType::class, $event); // cette action lie le form ) l'objet $player      
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){          
            // $modif = $player->getId() !== null;
            $entityManager->persist($event);
            $entityManager->flush();
            // $this->addFlash("success", ($modif) ? "La modification du joueur a été effectuée" : "L'ajout du joueur a été effectué");
            return $this->redirectToRoute("admin");
        }

        return $this->render('admin/modifEvent.html.twig', [
            "event" => $event,
            "form"   => $form->createView()
            // "isModification" => $player->getId() !== null

        ]);
    }

}
