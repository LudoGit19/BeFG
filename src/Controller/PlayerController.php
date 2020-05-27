<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\Player;
use App\Entity\SearchPlayer;
use App\Form\SearchPlayerType;
use App\Repository\TeamRepository;
use App\Repository\PlayerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{
    /**
     * @Route("/players", name="players")
     */
    public function index(PlayerRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {
        // 
        $searchPlayer = new SearchPlayer(); 
        
        
        $form = $this->createForm(SearchPlayerType::class, $searchPlayer);
        $form->handleRequest($request);
      

        $players = $paginatorInterface->paginate(
            $repo->findAllPagination($searchPlayer), 
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('player/players.html.twig', [
            "players" => $players,
            "form"     => $form->createView(),
            "admin"    => false
        ]);
    }

    // /**
    //  * @Route("/players", name="select_by_fname")
    //  */
    // public function selectFname(TeamRepository $repository, $name)
    // {
    //     $events = $repository->findByFname($name);
    //     dd($name);
    //     return $this->render('event/events.html.twig',[
    //         "events" => $events,
    //     ]);
    // }

    // private $repository;

    // public function __construct(Playerrepository $repository)
    // {
    //     $this->repository = $repository;
    // }



    // /**
    //  * @Route("/players", name="players")
    //  */
    // public function selectYearthOfBirth(PlayerRepository $repository)
    // {


    //    $player = $repository->findAllYearthOfBirth();
    //     // dd($player);
     
    //     return $this->render('player/players.html.twig', [
    //         "players" => $player
                   
    //     ]);
    // }

    // LES METHODES MAGIQUES

    // /**
    //  * @Route("/players", name="players")
    //  */
    // public function selectYearthOfBirth(PlayerRepository $repository)
    // {


    //    $player = $repository->findByYearOfBirth(2004);
    //     // dd($player);
     
    //     return $this->render('player/players.html.twig', [
    //         "players" => $player
                   
    //     ]);
    // }

    // /**
    //  * @Route("/players", name="players")
    //  */
    // public function ListTeamWithPlayers(PlayerRepository $repository)
    // {


    //    $listTeamPlayer= $repository->getTeamWithPlayer(Team::class);
    //     dd($listTeamPlayer);
     
    //     return $this->render('player/players.html.twig', [
    //         "listTeamPlayer" => $listTeamPlayer
                   
    //     ]);
    // }



}    