<?php

namespace App\Controller;

use App\Entity\SearchPlayer;
use App\Form\SearchPlayerType;
use App\Repository\PlayerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayerController extends AbstractController
{
    /**
     * @Route("/players", name="players")
     */
    public function index(PlayerRepository $repo, PaginatorInterface $paginatorInterface, Request $request)
    {
        $searchPlayer = new SearchPlayer(); 
        
        $form = $this->createForm(SearchPlayerType::class, $searchPlayer);
        $form->handleRequest($request);
        $players =  $paginatorInterface->paginate(
            $repo->findAllPagination($searchPlayer), 
            $request->query->getInt('page', 1), /*page number*/
            16 /*limit per page*/
        );
        return $this->render('player/players.html.twig', [
            "players" => $players,
            "form"     => $form->createView(),
            "admin"    => false
        ]);
    }
}

