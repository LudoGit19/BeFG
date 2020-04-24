<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Entity\SearchPlayer;
use App\Form\SearchPlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */

    public function index(PlayerRepository $repo, PaginatorInterface $paginatorInterface, Request $request)

    {
        $searchPlayer = new SearchPlayer(); 
        
        $form = $this->createForm(SearchPlayerType::class, $searchPlayer);
        $form->handleRequest($request);

        $players =  $paginatorInterface->paginate(
            $repo->findAllWithPagination($searchPlayer), 
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );;
        
        return $this->render('player/players.html.twig', [
            "players" => $players,
            "form"     => $form->createView(),
            "admin"    => true
        ]);
        
    }

    /**
     * @route("admin/creation", name="creation_player")
     * @Route("/admin/{id}", name="admin_player_modification")
     */

    public function modifEtAjout(Player $player = null, Request $request, EntityManagerInterface $entityManager){

        if(!$player) {
            $player = new Player();
        }

        $form = $this->createForm(PlayerType::class, $player); // cette action lie le form ) l'objet $player      
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // $modif = $player->getId() !== null;
            $entityManager->persist($player);
            $entityManager->flush();
            // $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute("admin");
        }

        return $this->render('admin/modifEtAjoutPlayer.html.twig', [
            "player" => $player,
            "form"   => $form->createView()
            // "isModification" => $player->getId() !== null

        ]);
    }
}
