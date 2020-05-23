<?php

namespace App\Controller\admin;

use App\Entity\Team;
use App\Entity\Player;
use App\Form\TeamType;
use App\Repository\TeamRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTeamController extends AbstractController
{
     /**
     * @Route("/admin", name="admin_teams")
     */
    public function index(TeamRepository $repository)
    {
        $teams = $repository->findAll();
        // dd($events);
        return $this->render('team/teams.html.twig',[
            "teams" => $teams,
           
        ]);
    }


    /**
     * @route("/admin/creation/team", name="admin_ajout_team")
     * @Route("/admin/{id}", name="admin_modification_team", methods="GET|POST")
     */

    public function modifEtAjout(Team $team = null, Request $request, EntityManagerInterface $entityManager){

        if(!$team) {
            $team = new Team();
        }

        $form = $this->createForm(TeamType::class, $team); // cette action lie le form ) l'objet $team    
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){          
            $modif = $team->getId() !== null;
            $entityManager->persist($team);
            $entityManager->flush();
            $this->addFlash("success", ($modif) ? "La modification de l'équipe a été effectué" : "L'ajout de l'équipe a été effectué");
            return $this->redirectToRoute("admin_teams");
        }

        return $this->render('admin/modifEtAjoutTeam.html.twig', [
            "team" => $team,
            "modifEtAjoutTeamForm"   => $form->createView()
         
        ]);
    }

     /**
     * @Route("/admin/team/{id}", name="admin_suppression_team", methods="delete")
     */

    public function suppression(Team $team, Request $request, EntityManagerInterface $entityManager){
                
        if($this->isCsrfTokenValid("SUP". $team->getId(),$request->get('_token'))){
                   
            $entityManager->remove($team);
            $entityManager->flush();
            $this->addFlash("success","La suppression a été effectuée");
            return $this->redirectToRoute("admin_teams");
        }

    }
}
