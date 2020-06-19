<?php

namespace App\Controller\admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEventController extends AbstractController
{
    /**
     * @Route("/admin/event/events", name="admin_events")
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
     * @route("/admin/event/event/creation", name="admin_ajout_event")
     * @route("/admin/event{id}", name="admin_modif_event", methods="GET|POST")
     * 
     */

    public function modifEtAjoutEvent(Event $event = null, Request $request, EntityManagerInterface $entityManager){

        if(!$event) {
            $event = new Event();
        }

        $form = $this->createForm(EventType::class, $event); // cette action lie le form ) l'objet $player      
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){   
            // dd($event);       
            $modif = $event->getId() !== null;
            $entityManager->persist($event);
            $entityManager->flush();
            $this->addFlash("success", ($modif) ? "La modification de l'évènement a été effectuée" : "L'ajout de l'évènement a été effectué");
            return $this->redirectToRoute("admin_events");
        }

        return $this->render('admin/modifEtAjoutEvent.html.twig', [
            "event" => $event,
            "modifEtAjoutEventForm" => $form->createView()
        ]);
    }

    
     /**
     * @Route("/admin/event{id}", name="admin_suppression_event", methods="delete")
     */

    public function suppression(Event $event, Request $request, EntityManagerInterface $entityManager){

        if($this->isCsrfTokenValid("SUP". $event->getId(),$request->get('_token'))){
                   
            $entityManager->remove($event);
            $entityManager->flush();
            $this->addFlash("success","La suppression a été effectuée");
            return $this->redirectToRoute("admin_events");
        }

    }

}
